<?php

namespace Luilliarcec\LaravelTable\Queries;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Luilliarcec\LaravelTable\Table;
use Spatie\QueryBuilder\QueryBuilder as BaseQueryBuilder;

class QueryBuilder extends BaseQueryBuilder
{
    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): LengthAwarePaginator
    {
        $perPage = $this->request->query('per_page', $perPage);

        $paginator = parent::paginate($perPage, $columns, $pageName, $page);

        $paginator->appends($this->request->query());

        return $paginator;
    }

    public function toPaginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Table
    {
        return $this->table()
            ->records($this->paginate($perPage, $columns, $pageName, $page));
    }

    public function toCollection($columns = ['*']): Table
    {
        return $this->table()
            ->records($this->get($columns));
    }
}
