<?php

namespace Luilliarcec\LaravelTable\Queries;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Luilliarcec\LaravelTable\Queries\Filters\SearchFilter;
use Luilliarcec\LaravelTable\Table;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder as BaseQueryBuilder;

abstract class QueryBuilder extends BaseQueryBuilder
{
    protected Table $table;

    public function __construct($subject, ?Request $request = null)
    {
        parent::__construct($subject, $request);

        $this->table = Table::make($this->tableName())
            ->columns($this->tableColumns())
            ->filters($this->tableFilters())
            ->actions($this->tableActions())
            ->emptyStateActions($this->tableEmptyStateActions());

        $this
            ->allowedSorts($this->getAllowedSorts())
            ->allowedFilters($this->getAllowedFilters());
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): LengthAwarePaginator
    {
        $perPage = $this->request->query('per_page', $perPage);

        $paginator = parent::paginate($perPage, $columns, $pageName, $page);

        $paginator->appends($this->request->query());

        return $paginator;
    }

    public function getTable(): Table
    {
        return $this->table;
    }

    public function toPaginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Table
    {
        return $this->table
            ->records($this->paginate($perPage, $columns, $pageName, $page));
    }

    public function toCollection($columns = ['*']): Table
    {
        return $this->table
            ->records($this->get($columns));
    }

    protected abstract function tableName(): string;

    protected abstract function tableColumns(): array;

    protected abstract function tableFilters(): array;

    protected abstract function tableActions(): array;

    protected abstract function tableEmptyStateActions(): array;

    protected function getAllowedSorts(): array
    {
        return $this->table->getSortableColumns();
    }

    protected function getAllowedFilters(): array
    {
        return [
            AllowedFilter::custom('search', new SearchFilter($this->table->getSearchableColumns())),
        ];
    }
}
