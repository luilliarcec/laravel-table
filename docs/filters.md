# Filters

Filters may be created using the static `make()` method, passing its name. The name of the filter should be unique.

```php
use Luilliarcec\LaravelTable\Filters;

Filters\TextFilter::make('name')
```

### Setting a label

By default, the label of the filter, which is displayed in the filter form, is generated from the name of the filter.
You may customize this using the `label()` method:

```php
use Luilliarcec\LaravelTable\Filters;

Filters\Filter::make('name')->label('Full name')
```

## Text filters

Text Filter allows you to quickly create a filter that allows the user to enter text to apply the filter to.
your table:

```php
use Luilliarcec\LaravelTable\Filters;

Filters\TextFilter::make('name')
```

## Select filters

Select filters allow you to quickly create a filter that allows the user to select an option to apply the filter to
their table:

```php
use Luilliarcec\LaravelTable\Filters;

Filters\SelectFilter::make('status')
    ->options([
        'draft' => 'Draft',
        'reviewing' => 'Reviewing',
        'published' => 'Published',
    ])
```

## Datetime Picker filters

Datetime picker filters allows you to quickly create a filter that allows the user to select a date or time to apply to
your table:

```php
use Luilliarcec\LaravelTable\Filters;

Filters\DateTimePickerFilter::make('created_at')
    ->date()

Filters\DateTimePickerFilter::make('created_at')
    ->datetime()

Filters\DateTimePickerFilter::make('created_at')
    ->time()
```

If you want to give your date filter superpowers you can use `flatpickr`, we have a super cool integration with this
package, make sure you have `flatpickr` installed in your app.

```php
use Luilliarcec\LaravelTable\Filters;

Filters\DateTimePickerFilter::make('created_at')
    ->flatpickr(
        fn(Flatpickr $flatpickr) => $flatpickr
            ->maxDate(now())
            ->mode('range')
    ),
```

