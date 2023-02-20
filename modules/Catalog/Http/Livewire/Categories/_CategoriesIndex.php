<?php

namespace OutMart\Modules\Catalog\Http\Livewire\Categories;

use Livewire\WithPagination;
use OutMart\Dashboard\Builder\GradBuilder;
use OutMart\Models\Product\Category;
use OutMart\Modules\Catalog\Events\CategoryGrad;

class CategoriesIndex extends GradBuilder
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $pathFields = 'catalog.categories.sdsd';
    protected $model = Category::class;
    // protected $paginate = 3;


    protected function headers()
    {
        $this->table->addColumn([
            'lable' => 'ID',
            'body' => [
                'type' => 'model',
                'value' => 'id',
            ],
        ]);

        $this->table->addColumn([
            'lable' => 'Name',
            'body' => [
                'type' => 'model',
                'value' => 'name',
            ],
        ]);

        CategoryGrad::dispatch($this->table, $this->columns);
    }

    public function deleteIt(Category $category, $checkChildren = true)
    {
        if ($checkChildren) {
            return ($category->hasChildren()) ? 'hasChildren' : 'notHasChildren';
        }

        return ($category->delete()) ? 'done' : 'error';
    }
}
