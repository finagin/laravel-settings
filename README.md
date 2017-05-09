# Settings for Laravel 5.4 and up
<p align="center">
<a href="https://packagist.org/packages/finagin/laravel-settings"><img src="https://img.shields.io/packagist/v/finagin/laravel-settings.svg?style=flat-square" alt="Latest Version on Packagist"></a>
<a href="https://styleci.io/repos/90740623"><img src="https://styleci.io/repos/90740623/shield" alt="StyleCI"></a>
<a href="https://packagist.org/packages/finagin/laravel-settings"><img src="https://img.shields.io/packagist/dt/finagin/laravel-settings.svg?style=flat-square" alt="Total Downloads"></a>
<a href="https://github.com/finagin/laravel-settings/blob/master/LICENSE"><img src="https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square" slt="license"></a>
<br>
<a href="https://github.com/finagin/laravel-settings"><img src="https://img.shields.io/github/stars/finagin/laravel-settings.svg?style=social&label=Star" alt="GitHub stars"></a>
</p>

* [Installation](#installation)
* [Usage](usage)
* [License](license)

## Installation

This package can be used in Laravel 5.4 or higher.
You can install the package via composer:
```bash
composer require finagin/laravel-settings
```
Now add the service provider in config/app.php file:
```php
'providers' => [
    /*
     * Package Service Providers...
     */
    // ...
    Finagin\Settings\SettingsServiceProvider::class,
    // ...
];
```
You must publish the migration with:
```bash
php artisan vendor:publish --provider="Finagin\Settings\SettingsServiceProvider" --tag="migrations"
```
After the migration has been published you must create the settings-tables by running the migrations:
```bash
php artisan migrate
```
Also you can publish the config file with:
```bash
php artisan vendor:publish --provider="Finagin\Settings\SettingsServiceProvider" --tag="config"
```
## Usage

```php
$key = 'some_key';
$value = 'some value';
$default = 'default value';

echo Settings::get($key, $default));
// output: default value

Settings::set($key, $value));
echo Settings::get($key, $default));
// output: some value

echo Settings::unset($key));
// output: true
echo Settings::unset($key));
// output: false

echo Settings::get($key, $default));
// output: default value
```

## License

The MIT License ([MIT](https://opensource.org/licenses/MIT)). Please see [License File](https://github.com/finagin/laravel-settings/blob/master/LICENSE) for more information.
