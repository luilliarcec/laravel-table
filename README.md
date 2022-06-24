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

### Table

To start you will have to create a table object, and you will start configuring your table from your Controller or a
specialized class, the choice is yours.

Let's see an example.

```php
namespace App\Http\Queries;

use App\Models\User;
use Luilliarcec\LaravelTable\Queries\QueryBuilder;
use Luilliarcec\LaravelTable\Table;

class UserIndexQuery extends QueryBuilder
{
    // Here is your class constructor with the configuration of your spatie/laravel-query-builder.
    
    public function table(): Table
    {
        return Table::make('users')
    }
}
```

If you want to add `records` to your table.

```php
use Luilliarcec\LaravelTable\Table;

Table::make('users')->records(/* ... Paginate|Collection */)
```

If you want to add `columns` to your table.

```php
use Luilliarcec\LaravelTable\Table;

Table::make('users')->columns([/* ... */])
```

If you want to add `filters` to your table.

```php
use Luilliarcec\LaravelTable\Table;

Table::make('users')->filters([/* ... */])
```

If you want to add a global `search input` for your table.

```php
use Luilliarcec\LaravelTable\Table;

Table::make('users')->searchable()
```

### Columns

Columns may be created using the static `make()` method, passing its name. The name of the column should correspond to a
column or accessor on your model. You may use "dot syntax" to access columns within relationships.

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('title')

Columns\TextColumn::make('author.name')
```

##### Setting a label

By default, the label of the column, which is displayed in the header of the table, is generated from the name of the
column. You may customize this using the `label()` method:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('title')->label('Post title')
```

##### Sorting

Columns may be sortable, by clicking on the column label. To make a column sortable, you must use the `sortable()`
method:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('title')->sortable()
```

##### Opening URLs

To open a URL, you may use the `url()` method, passing a callback or static URL to open. Callbacks accept a `$record`
parameter which you may use to customize the URL:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('title')
    ->url(fn (Book $record): string => route('books.edit', ['book' => $record]))
```

You may also choose to open the URL in a new tab:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('title')
    ->url(fn (Book $record): string => route('books.edit', ['book' => $record]))
    ->openUrlInNewTab()
```

##### Setting a default value

To set a default value for fields with a `null` state, you may use the `default()` method:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('title')->default('Untitled')
```

##### Responsive layouts

You may choose to show and hide columns based on the
responsive [breakpoint](https://tailwindcss.com/docs/responsive-design#overview) of the browser.
To do this, you may use a `visibleFrom()` or `hiddenFrom()` method:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('slug')->visibleFrom('md')

Columns\TextColumn::make('slug')->hiddenFrom('md')
```

##### Tooltips

If you want to use tooltips, make sure you have `@ryangjchandler/alpine-tooltip` installed in
your app, including `tippy.css`.

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('title')
    ->tooltip('Title')
```

This method also accepts a closure that can access the current table record:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('title')
    ->tooltip(fn (Model $record): string => "By {$record->author->name}")
```

##### Custom attributes

The HTML of columns can be customized, by passing an array of `extraAttributes()`:

```php
use Luilliarcec\LaravelTable\Columns;
 
Columns\TextColumn::make('slug')->extraAttributes(['class' => 'bg-gray-200'])
```

These get merged onto the outer `<div>` element of each cell in that column.

### Text column

You may use the `date()` and `dateTime()` methods to format the column's state
using [PHP date formatting tokens](https://www.php.net/manual/en/datetime.format.php):

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('created_at')->dateTime()
```

You may use the `since()` method to format the column's state
using [Carbon's `diffForHumans()`](https://carbon.nesbot.com/docs/#api-humandiff):

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('created_at')->since()
```

The `money()` method allows you to easily format monetary values, in any currency. This functionality
uses [`akaunting/laravel-money`](https://github.com/akaunting/laravel-money) internally:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('price')->money('eur')
```

You may `limit()` the length of the cell's value:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('description')->limit(50)
```

You may also reuse the value that is being passed to `limit()`:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('description')
    ->limit(50)
    ->tooltip(function (Columns\TextColumn $column): ?string {
        $state = $column->getState();
    
        if (strlen($state) <= $column->getLimit()) {
            return null;
        }
        
        // Only render the tooltip if the column contents exceeds the length limit.
        return $state;
    })
```

If your column value is HTML, you may render it using `html()`:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('description')->html()
```

You may also transform a set of known cell values using the `enum()` method:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('status')->enum([
    'draft' => 'Draft',
    'reviewing' => 'Reviewing',
    'published' => 'Published',
])
```

You may instead pass a custom formatting callback to `formatStateUsing()`, which accepts the `$state` of the cell, and
optionally its `$record`:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('status')
    ->formatStateUsing(fn (string $state): string => __("statuses.{$state}"))
```

If you'd like your column's content to wrap if it's too long, you may use the `wrap()` method:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('description')->wrap()
```

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
