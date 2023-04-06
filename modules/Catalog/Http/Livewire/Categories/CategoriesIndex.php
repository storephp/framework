<?php

namespace Basketin\Modules\Catalog\Http\Livewire\Categories;

use Basketin\Models\Product\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Basketin\Dashboard\Views\Layouts\DashboardLayout;

class CategoriesIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $categories = Category::paginate(15);

        return view('basketin::catalog.categories.index', [
            'categories' => $categories,
        ])->layout(DashboardLayout::class);
    }

    public function deleteIt(Category $category, $checkChildren = true)
    {
        if ($checkChildren) {
            return ($category->hasChildren()) ? 'hasChildren' : 'notHasChildren';
        }

        return ($category->delete()) ? 'done' : 'error';
    }
}
