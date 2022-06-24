# Laravel Table

[![Latest Version on Packagist](https://img.shields.io/packagist/v/luilliarcec/laravel-table.svg)](https://packagist.org/packages/luilliarcec/laravel-table)
[![Total Downloads](https://img.shields.io/packagist/dt/luilliarcec/laravel-table)](https://packagist.org/packages/luilliarcec/laravel-table)
[![GitHub license](https://img.shields.io/github/license/luilliarcec/laravel-table)](https://github.com/luilliarcec/laravel-table/blob/develop/LICENSE.md)

<a href="https://www.buymeacoffee.com/luilliarcec" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/default-orange.png" alt="Buy Me A Coffee" height="41" width="174"></a>

The purpose of this package is to save time on filter and table design. Although there are similar packages, they add
too much complexity or are tied to a frontend stack like Livewire or Inertiajs. However, this package is designed to be
easy to use without the need for an additional stack.

Its operation is simple, it takes the query of your request by adding your new queries to said query and synchronously
filtering by making http requests.

It should be noted that all filters will be grouped into an array called filters. On the other hand, the columns are
grouped in a matrix called columns, in this way, the package is prepared to work perfectly with Spatie's package,
laravel-query-builder.

## Installation

You can install the package via composer:

```bash
composer require luilliarcec/laravel-table
```

Can export package configuration and component views.

```bash
php artisan vendor:publish --provider="Luilliarcec\LaravelTable\LaravelTableServiceProvider"
```

## Usage

## Examples

To visualize the operation of the package together
with [spatie/laravel-query-builder](https://github.com/spatie/laravel-query-builder/tree/master) you can see the
[demo](https://laravel-table.herokuapp.com/). If you want to check the demo code, you can check the
repository [Laravel Table Demo](https://github.com/luilliarcec/laravel-table-demo)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email luilliarcec@gmail.com instead of using the issue tracker.

## Credits

- [Luis Andrés Arce C.](https://github.com/luilliarcec)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
