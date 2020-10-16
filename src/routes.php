<?php

use Orlyapps\LaravelGithubChangelog\Http\Controllers\ChangelogController;

Route::get('/changelog', ChangelogController::class)->name('changelog');
