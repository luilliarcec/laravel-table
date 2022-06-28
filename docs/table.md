# Table

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
