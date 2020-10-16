<?php

namespace Orlyapps\LaravelGithubChangelog\Tests;

use Orchestra\Testbench\TestCase;
use Orlyapps\LaravelGithubChangelog\LaravelGithubChangelogServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelGithubChangelogServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
