# Programic - Automatic task runner

[![Latest Version on Packagist](https://img.shields.io/packagist/v/programic/laravel-task.svg?style=flat-square)](https://packagist.org/packages/programic/laravel-task)
![](https://github.com/programic/laravel-task/workflows/Run%20Tests/badge.svg?branch=master)
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/programic/laravel-task/run-php-tests?label=Tests)
[![Total Downloads](https://img.shields.io/packagist/dt/programic/laravel-task.svg?style=flat-square)](https://packagist.org/packages/programic/laravel-task)

This package allows you to automate tasks as in migrations

### Installation
This package requires PHP 7.2 and Laravel 5.8 or higher.

```
composer require programic/laravel-task
```

### Basic Usage
```bash
# Create Task
php artisan make:task RunTaskClass

# Run Tasks
php artisan migrate
```

### Conditions
```php
Task::when($condition, function (ConsoleOutput $output) {

});

Task::fresh(fn (ConsoleOutput $output) => '');
Task::noFresh(fn (ConsoleOutput $output) => '');
```


### Testing
```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security-related issues, please email [info@programic.com](mailto:info@programic.com) instead of using the issue tracker.

## Credits

- [Rick Bongers](https://github.com/rbongers)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
