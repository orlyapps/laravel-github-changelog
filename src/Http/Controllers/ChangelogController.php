<?php

namespace Orlyapps\LaravelGithubChangelog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;

class ChangelogController
{
    public function __invoke(Request $request)
    {
        $changelog = \LaravelGithubChangelog::changelog();
        $history = null;
        if (file_exists(base_path('HISTORY.md'))) {
            $history = Markdown::parse(file_get_contents(base_path('HISTORY.md')))->toHtml();
        }
        return view('github-changelog::index', compact('changelog', 'history'));
    }
}
