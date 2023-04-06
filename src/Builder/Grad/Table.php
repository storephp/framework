<?php

namespace Basketin\Dashboard\Builder\Grad;

class Table
{
    private $columns = [];

    public function addColumn($column)
    {
        $this->columns[] = $column;
    }

    /**
     * Get the value of fields
     */
    public function getColumns()
    {
        return $this->columns;
    }
}
