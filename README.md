# Laravel Table

[![Latest Version on Packagist](https://img.shields.io/packagist/v/luilliarcec/laravel-table.svg)](https://packagist.org/packages/luilliarcec/laravel-table)
[![Total Downloads](https://img.shields.io/packagist/dt/luilliarcec/laravel-table)](https://packagist.org/packages/luilliarcec/laravel-table)
[![GitHub license](https://img.shields.io/github/license/luilliarcec/laravel-table)](https://github.com/luilliarcec/laravel-table/blob/develop/LICENSE.md)

<a href="https://www.buymeacoffee.com/luilliarcec" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/default-orange.png" alt="Buy Me A Coffee" height="41" width="174"></a>

I have to first thank the guys at [Filament](https://filamentphp.com/), I used a lot of their code to improve `v4` of
this package, and make it much better. The main difference between this package
and [filament/tables](https://filamentphp.com/docs/2.x/tables/installation) is that this package
is meant to work traditionally without Livewire.

To give this table superpowers, several packages were used,
especially [spatie/laravel-query-builder](https://github.com/spatie/laravel-query-builder/tree/main)

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

[Table DOCS](docs/table.md)

[Columns DOCS](docs/columns.md)

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
