<?php

namespace Store\Modules\Customers\Http\Livewire\Categories;

use Livewire\Component;
use Livewire\WithPagination;
use Store\Dashboard\Views\Layouts\DashboardLayout;
use Store\Models\Product\Category;
use Store\Modules\Customers\Models\Customer;

class CustomersIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $customers = Customer::query()->paginate(15);

        return view('storeCustomers::customers.index', [
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
