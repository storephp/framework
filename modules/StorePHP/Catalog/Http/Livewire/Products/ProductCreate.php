<?php

namespace Store\Modules\StorePHP\Catalog\Http\Livewire\Products;

use Livewire\WithFileUploads;
use Store\Support\Facades\Product;
use StorePHP\Bundler\Abstracts\FromAbstract;
use StorePHP\Dashboard\Views\Layouts\DashboardLayout;

class ProductCreate extends FromAbstract
{
    use WithFileUploads;

    protected $pretitle = 'Catalog';
    protected $title = 'Create new product';

    public $formId = 'storephp_catalog_products_form';

    public function layout()
    {
        return DashboardLayout::class;
    }

    public function submit()
    {
        $validateData = $this->validate();

        $product = Product::create([
            'sku' => $validateData['sku'],
        ]);

        foreach ($this->models(['sku', 'thumbnail_path']) as $model) {
            $product->{$model} = $validateData[$model];
        }

        if ($this->thumbnail_path) {
            $product->thumbnail_path = $this->thumbnail_path->store('photos');
        }

        $product->save();

        return $this->pushAlert('success', 'The product has been created');
    }
}
