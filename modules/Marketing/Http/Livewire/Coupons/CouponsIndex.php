<?php

namespace OutMart\Modules\Marketing\Http\Livewire\Coupons;

use Livewire\Component;
use Livewire\WithPagination;
use OutMart\Dashboard\Views\Layouts\DashboardLayout;
use OutMart\Support\Facades\Coupon;

class CouponsIndex extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $coupons = Coupon::getList();

        return view('outmartMarketing::coupons.index', [
            'coupons' => $coupons,
        ])->layout(DashboardLayout::class);
    }

    public function deleteIt(Product $product)
    {
        return ($product->delete()) ? 'done' : 'error';
    }
}
