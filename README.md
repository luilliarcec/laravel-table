# Laravel Table

[![run-tests](https://github.com/luilliarcec/laravel-table/actions/workflows/run-tests.yml/badge.svg)](https://github.com/luilliarcec/laravel-table/actions/workflows/run-tests.yml)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/luilliarcec/laravel-table.svg)](https://packagist.org/packages/luilliarcec/laravel-table)
[![Total Downloads](https://img.shields.io/packagist/dt/luilliarcec/laravel-table)](https://packagist.org/packages/luilliarcec/laravel-table)
[![GitHub license](https://img.shields.io/github/license/luilliarcec/laravel-table)](https://github.com/luilliarcec/laravel-table/blob/develop/LICENSE.md)

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

First configure the theme you are going to use, Bootstrap or Tailwind in your configuration file `config\table.php`.

```php
return [
    /** tailwind  / bootstrap4 / bootstrap5 */
    'theme' => 'tailwind'
];
```

To make use of the package, it is very simple, you just have to inject the `Luilliarcec\LaravelTable\Support\BladeTable`
class as a dependency or use the Facade `Luilliarcec\LaravelTable\Facades\Table` in your controller, for example:

```php
use Luilliarcec\LaravelTable\Support\BladeTable;

class UsersController extends Controller
{
    public function index(BladeTable $table)
    {
        return view('users.index', [
            'users' => User::paginate(),
            'table' => $table
        ]);
    }
}
```

Notice how I send my table object, and with that I would have my table in my views. Something else that you should keep
in mind is that you must provide your data bag, in this case `users`. Note that you must pass an instance
of `\Illuminate\Contracts\Pagination\Paginator` or `\Illuminate\Database\Eloquent\Collection`.

### Filters

There are several types of filters that you can use, however there will be one or more that you will have to add some
JS. For example, the filters for a single date, use the `type="date"` so you will not have any problem, however if you
want to use a date range filter you will have to add a JS plugin. From here from the top of Everest we recommend using
`Flatpickr`, it is a very powerful component and very easy to use and does not depend on JQuery.

The use of the table constructor is as follows.:

```php
use Luilliarcec\LaravelTable\Support\BladeTable;
use Luilliarcec\LaravelTable\Support\Filter;

class UsersController extends Controller
{
    public function index(BladeTable $table)
    {
        return view('users.index', [
            'users' => User::paginate(),
            'table' => $table
                ->addFilter('created_at', 'Created At', Filter::DATE_RANGE)
                ->addFilter('name', 'Name', Filter::TEXT)
                ->addFilter('verified', 'Verified', Filter::SELECT, [
                    'verified' => 'Verified',
                    'unverified' => 'Not verified'
                ])
        ]);
    }
}
```

If you notice, there are 3 main things that all filters will receive as parameters. The first is the `name` with which
the input or filter is identified, second is the `label`, which your user will be able to read and third the `type` of
filter. There is a fourth parameter `options` but it is optional and is only used in option filters like select or
checkbox.

List of available filters.

| Filter | Custom CSS Class | Receive options array? |
| --- | --- | --- |
| `Filter::TEXT` | filter-text | `false` |
| `Filter::SELECT` | filter-select | `true` |
| `Filter::SELECT_MULTIPLE` | filter-select-multiple | `true` |
| `Filter::DATE` | filter-date | `false` |
| `Filter::DATE_RANGE` | filter-date-range | `false` |
| `Filter::CHECKBOX` | filter-checkbox | `true` |

### Columns

The component allows you to select the columns of your table to display, for this you must define in your table object
which columns you want to have this function as follows.

```php
use Luilliarcec\LaravelTable\Support\BladeTable;
use Luilliarcec\LaravelTable\Support\Filter;

class UsersController extends Controller
{
    public function index(BladeTable $table)
    {
        return view('users.index', [
            'users' => User::paginate(),
            'table' => $table
                // ...
                ->addColumn('email', 'Email')
                ->addColumn('email_verified_at', 'Email verified At')
                ->addColumn('created_at', 'Created At')
                
                // Or you can even use array syntax
                
                ->addColumns([
                    'email' => 'Email',
                    'email_verified_at' => 'Email verified At',
                    'created_at' => 'Created At'
                ])
        ]);
    }
}
```

You must use the `<x-table::th/>` and `<x-table::td/>` components, in fact we recommend the use of these two components
as a way of design abstraction, even if you are not making use of columns or sort in some of your columns.

### Blade

You can use your table with filters in your views as follows.:

```html

<x-table::styles/>

<!-- ... -->

<x-table::table
    :meta="$users"
    :table="$table"
>
    <x-slot name="head">
        <tr>
            <!-- This is a static column that is always displayed -->
            <x-table::th column-key="id" class="border-gray-200" :show="true">
                Id
            </x-table::th>

            <!-- This is a sortable column that is always displayed -->
            <x-table::th column-key="name" class="border-gray-200" :sortable="true" :show="true">
                Name
            </x-table::th>

            <!-- This is a conditionally displayable and sortable column -->
            <x-table::th column-key="email" class="border-gray-200" :sortable="true">
                Email
            </x-table::th>

            <!-- This is a conditionally displayable and sortable column -->
            <x-table::th column-key="email_verified_at" class="border-gray-200" :sortable="true">
                Email verified at
            </x-table::th>

            <!-- This is a conditionally displayable and sortable column -->
            <x-table::th column-key="created_at" class="border-gray-200" :sortable="true">
                Created at
            </x-table::th>
        </tr>
    </x-slot>

    <x-slot name="body">
        @foreach($users as $user)
        <tr>
            <x-table::th scope="row" column-key="id" :show="true">
                {{ $user->id }}
            </x-table::th>

            <x-table::td column-key="name" :show="true">
                {{ $user->name }}
            </x-table::td>

            <x-table::td column-key="email">
                {{ $user->email }}
            </x-table::td>

            <x-table::td column-key="email_verified_at">
                {{ $user->email_verified_at }}
            </x-table::td>

            <x-table::td column-key="created_at">
                {{ $user->created_at }}
            </x-table::td>
        </tr>
        @endforeach
    </x-slot>
</x-table::table>

<!-- ... -->

<x-table::scripts/>

<script>
    const dateRanges = document.querySelectorAll('.filter-date-range');

    dateRanges.forEach(e => flatpickr(e, {
            mode: 'range'
        })
    );
</script>
```

Don't forget to import the table styles and scripts. Don't worry there are a few small ones that are needed, you are
free to review these files and replace them as you like, as well as the components.

The sort functionality of this component is only limited to adding the icons and making the switch between up, down or
neutral.

```html

<x-table:styles/>
...
<x-table:scripts/>
```

If you noticed, I added the flatpickr plugin to my component making use of the `.filter-date-range` css class exposed in
the component.

## Examples

To visualize the operation of the package together
with [spatie/laravel-query-builder](https://github.com/spatie/laravel-query-builder/tree/master) you can see the
[demo](https://laravel-table.herokuapp.com/). If you want to check the demo code, you can check the
repository [Laravel Table Demo](https://github.com/luilliarcec/laravel-table-demo)

## Testing

``` bash
composer test
```

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
