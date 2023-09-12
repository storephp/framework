<?php

namespace StorePHP\Catalog\Http\Livewire\Categories;

use Store\Models\Product\Category;
use StorePHP\Bundler\Abstracts\FromAbstract;
use StorePHP\Dashboard\Views\Layouts\DashboardLayout;

class CategoryUpdate extends FromAbstract
{
    public $formId = 'storephp_catalog_categories_form';

    protected $pretitle = 'Catalog';
    protected $title = 'Update the category';

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->parent_id = $category->parent_id;
        $this->slug = $category->slug;
        $this->name = $category->name;
    }

    public function layout()
    {
        return DashboardLayout::class;
    }

    public function submit()
    {
        $validateData = $this->validate();

        foreach ($this->models() as $model) {
            $this->category->{$model} = $validateData[$model];
        }

        $this->category->save();
    }
}
