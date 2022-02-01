<?php

namespace Orlyapps\LaravelGithubChangelog;

use Carbon\Carbon;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Http;

class LaravelGithubChangelog
{
    public function releases()
    {
        return collect(
            Http::withHeaders(['Authorization' => 'token ' . config('github-changelog.github.token')])
                ->get(
                    'https://api.github.com/repos/' .
                    config('github-changelog.github.user') . '/' .
                    config('github-changelog.github.repo') . '/releases'
                )
                ->json()
        )->map(function ($release) {
            return [
                'name' => $release['name'],
                'created_at' => Carbon::parse($release['created_at'])->diffForHumans(),
                'body' => Markdown::parse($release['body'])->toHtml(),
            ];
        })
        ->filter(fn ($release) => !empty($release['name']));
    }

    public function changelog()
    {
        return collect(
            Http::withHeaders(['Authorization' => 'token ' . config('github-changelog.github.token')])
                ->get(
                    'https://api.github.com/repos/' .
                    config('github-changelog.github.user') . '/' .
                    config('github-changelog.github.repo') . '/commits?per_page=100&since=' .
                    config('github-changelog.github.since')
                )
                ->json()
        )->map(function ($commit) {
            $matches = $this->matchCommitSyntax($commit['commit']['message']);
            if (count($matches) < 3) {
                return null;
            }
            $mapping = config('github-changelog.types');
            return [
                'author' => $commit['commit']['author']['name'],
                'date' => new \DateTime($commit['commit']['author']['date']),
                'subject' => $matches['subject'],
                'type' => $mapping[$matches['type']],
                'scope' => str_replace(['(', ')'], '', $matches['scope']),
            ];
        })
        ->filter(fn ($value) => !is_null($value))
        ->groupBy(function ($commit) {
            return $commit['date']->format('d.m.Y');
        })
        ->map(function ($day) {
            return $day->groupBy(function ($commit) {
                return $commit['type'];
            });
        });
    }

    protected function matchCommitSyntax($message)
    {
        preg_match('/(?<type>fix|feat|improvement|chore|security|performance)(?<scope>(?:\([^()\r\n]*\)|\()?(?<breaking>!)?): (?<subject>.*)?/m', $message, $matches);
        return $matches;
    }
}
