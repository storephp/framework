<?php

namespace Basketin\Modules\Customers\Http\Livewire\Categories;

use Livewire\Component;
use Livewire\WithPagination;
use Basketin\Dashboard\Views\Layouts\DashboardLayout;
use Basketin\Models\Product\Category;
use Basketin\Modules\Customers\Models\Customer;

class CustomersIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $customers = Customer::query()->paginate(15);

        return view('basketinCustomers::customers.index', [
            'customers' => $customers,
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
