# Columns

Columns may be created using the static `make()` method, passing its name. The name of the column should correspond to a
column or accessor on your model. You may use "dot syntax" to access columns within relationships.

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('title')

Columns\TextColumn::make('author.name')
```

### Setting a label

By default, the label of the column, which is displayed in the header of the table, is generated from the name of the
column. You may customize this using the `label()` method:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('title')->label('Post title')
```

### Sorting

Columns may be sortable, by clicking on the column label. To make a column sortable, you must use the `sortable()`
method:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('title')->sortable()
```

### Searching
Columns may be searchable, by using the text input in the top right of the table. To make a column searchable, you must
use the `searchable()` method:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('title')->searchable()
```

### Opening URLs

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

### Setting a default value

To set a default value for fields with a `null` state, you may use the `default()` method:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('title')->default('Untitled')
```

### Responsive layouts

You may choose to show and hide columns based on the
responsive [breakpoint](https://tailwindcss.com/docs/responsive-design#overview) of the browser.
To do this, you may use a `visibleFrom()` or `hiddenFrom()` method:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TextColumn::make('slug')->visibleFrom('md')

Columns\TextColumn::make('slug')->hiddenFrom('md')
```

### Tooltips

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

### Custom attributes

The HTML of columns can be customized, by passing an array of `extraAttributes()`:

```php
use Luilliarcec\LaravelTable\Columns;
 
Columns\TextColumn::make('slug')->extraAttributes(['class' => 'bg-gray-200'])
```

These get merged onto the outer `<div>` element of each cell in that column.

## Text column

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

## Boolean column

Boolean columns render a check or cross icon representing their state:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\BooleanColumn::make('is_featured')
```

You may customize the icon representing each state. Icons are the name of a Blade component present. By
default, [Heroicons](https://heroicons.com) are installed:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\BooleanColumn::make('is_featured')
    ->trueValue('heroicon-o-badge-check')
    ->falseValue('heroicon-o-x-circle')

Columns\BooleanColumn::make('is_featured')
    ->trueValue('Yes')
    ->falseValue('No')
```

You may customize the icon color representing each state. These may be either `primary`, `secondary`, `success`
, `warning` or `danger`:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\BooleanColumn::make('is_featured')
    ->trueColor('primary')
    ->falseColor('warning')
```

## Image column

```php
use Luilliarcec\LaravelTable\Columns;

Columns\ImageColumn::make('header_image')
```

You may make the image fully `rounded()`, which is useful for rendering avatars:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\ImageColumn::make('author.avatar')->rounded()
```

You may customize the image size by passing a `width()` and `height()`, or both with `size()`:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\ImageColumn::make('header_image')->width(200)
Columns\ImageColumn::make('header_image')->height(50)
Columns\ImageColumn::make('author.avatar')->size(40)
```

By default, the `public` disk will be used to retrieve images. You may pass a custom disk name to the `disk()` method:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\ImageColumn::make('header_image')->disk('s3')
```

### Private images

Filament can generate temporary URLs to render private images, you may set the `visibility()` to `private`:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\ImageColumn::make('header_image')->visibility('private')
```

You may customize the extra HTML attributes of the image using `extraImgAttributes()`:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\ImageColumn::make('logo')
    ->extraImgAttributes(['title' => 'Company logo']),
```

## Icon column

Icon columns render a Blade icon component representing their contents:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\IconColumn::make('is_featured')
    ->options([
        'heroicon-o-x-circle',
        'heroicon-o-pencil' => 'draft',
        'heroicon-o-clock' => 'reviewing',
        'heroicon-o-check-circle' => 'published',
    ])
```

You may also pass a callback to activate an option, accepting the cell's `$state`:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\IconColumn::make('is_featured')
    ->options([
        'heroicon-o-x-circle',
        'heroicon-o-pencil' => fn ($state): bool => $state === 'draft',
        'heroicon-o-clock' => fn ($state): bool => $state === 'reviewing',
        'heroicon-o-check-circle' => fn ($state): bool => $state === 'published',
    ])
```

Icon columns may also have a set of icon colors, using the same syntax. They may be either `primary`, `secondary`
, `success`, `warning` or `danger`:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\IconColumn::make('is_featured')
    ->options([
        'heroicon-o-x-circle',
        'heroicon-o-pencil' => 'draft',
        'heroicon-o-clock' => 'reviewing',
        'heroicon-o-check-circle' => 'published',
    ])
    ->colors([
        'secondary',
        'danger' => 'draft',
        'warning' => 'reviewing',
        'success' => 'published',
    ])
```

## Badge column

Badge columns render a colored badge with the cell's contents. You may use the same formatting methods as
for [text columns](#text-column):

```php
use Luilliarcec\LaravelTable\Columns;

Columns\BadgeColumn::make('status')
    ->enum([
        'draft' => 'Draft',
        'reviewing' => 'Reviewing',
        'published' => 'Published',
    ])
```

Badges may have a color. It may be either `primary`, `success`, `warning` or `danger`:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\BadgeColumn::make('status')
    ->colors([
        'primary',
        'danger' => 'draft',
        'warning' => 'reviewing',
        'success' => 'published',
    ])
```

You may instead activate a color using a callback, accepting the cell's `$state`:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\BadgeColumn::make('status')
    ->colors([
        'primary',
        'danger' => fn ($state): bool => $state === 'draft',
        'warning' => fn ($state): bool => $state === 'reviewing',
        'success' => fn ($state): bool => $state === 'published',
    ])
```

Badges may also have an icon:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\BadgeColumn::make('status')
    ->icons([
        'heroicon-o-x',
        'heroicon-o-document' => 'draft',
        'heroicon-o-refresh' => 'reviewing',
        'heroicon-o-truck' => 'published',
    ])
```

Alternatively, you may conditionally display an icon using a closure:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\BadgeColumn::make('status')
    ->icons([
        'heroicon-o-x',
        'heroicon-o-document' => fn ($state): bool => $state === 'draft',
        'heroicon-o-refresh' => fn ($state): bool => $state === 'reviewing',
        'heroicon-o-truck' => fn ($state): bool => $state === 'published',
    ])
```

You may set the position of an icon using `iconPosition()`:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\BadgeColumn::make('status')
    ->icons([
        'heroicon-o-x',
        'heroicon-o-document' => 'draft',
        'heroicon-o-refresh' => 'reviewing',
        'heroicon-o-truck' => 'published',
    ])
    ->iconPosition('after') // `before` or `after`
```

## Tags column

Tags columns render a list of tags from an array:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TagsColumn::make('tags')
```

Be sure to add an `array` [cast](https://laravel.com/docs/eloquent-mutators#array-and-json-casting) to the model
property.

Instead of using an array, you may use a separated string by passing the separator into `separator()`:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\TagsColumn::make('tags')->separator(',')
```

## View column

You may render a custom view for a cell using the `view()` method:

```php
use Luilliarcec\LaravelTable\Columns;

Columns\ViewColumn::make('status')->view('columns.custom-view')
```

Inside your view, you may retrieve the state of the cell using the `$getState()` method:

```blade
<div>
    {{ $getState() }}
</div>
```

## Building custom columns

You may create your own custom column classes and cell views, which you can reuse across your project, and even release
as a plugin to the community.

> If you're just creating a simple custom column to use once, you could instead use a [view column](#view-column) to
> render any custom Blade file.

```php
use Luilliarcec\LaravelTable\Columns\Column;

class StatusSwitcher extends Column
{
    protected string $view = 'columns.custom-column';
}
```

Inside your view, you may retrieve the state of the cell using the `$getState()` method:

```blade
<div>
    {{ $getState() }}
</div>
```
