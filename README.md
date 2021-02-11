# Generates a Changelog based on github commits

[![Latest Version on Packagist](https://img.shields.io/packagist/v/orlyapps/laravel-github-changelog.svg?style=flat-square)](https://packagist.org/packages/orlyapps/laravel-github-changelog)
[![Total Downloads](https://img.shields.io/packagist/dt/orlyapps/laravel-github-changelog.svg?style=flat-square)](https://packagist.org/packages/orlyapps/laravel-github-changelog)

## Installation

You can install the package via composer:

```bash
composer require orlyapps/laravel-github-changelog
php artisan vendor:publish --provider="Orlyapps\LaravelGithubChangelog\LaravelGithubChangelogServiceProvider" --tag="config"
```

### Update Config
```php

return [
    'github' => [
        'user' => '', // Github User
        'repo' => '', // Repository Name
        'token' => '', // Github Personal Access Token: https://github.com/settings/tokens
        'since' => '2020-10-13'
    ],
];    
```
## Usage

https:///yourproject.com/changelog

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email info@orlyapps.de instead of using the issue tracker.

## Credits

-   [Florian Strauß](https://github.com/orlyapps)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
