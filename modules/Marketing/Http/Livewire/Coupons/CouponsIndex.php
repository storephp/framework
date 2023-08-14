<?php

namespace Store\Modules\Marketing\Http\Livewire\Coupons;

use Livewire\Component;
use Livewire\WithPagination;
use StorePHP\Dashboard\Views\Layouts\DashboardLayout;
use Store\Support\Facades\Coupon;

class CouponsIndex extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $coupons = Coupon::getListWithSearch($this->search ?? null);

        return view('storeMarketing::coupons.index', [
            'coupons' => $coupons,
        ])->layout(DashboardLayout::class);
    }

    public function deleteIt(Product $product)
    {
        return ($product->delete()) ? 'done' : 'error';
    }
}
