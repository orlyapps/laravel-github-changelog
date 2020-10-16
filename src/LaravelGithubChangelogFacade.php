<?php

namespace Orlyapps\LaravelGithubChangelog;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Orlyapps\LaravelGithubChangelog\Skeleton\SkeletonClass
 */
class LaravelGithubChangelogFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-github-changelog';
    }
}
