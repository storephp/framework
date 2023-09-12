<?php

namespace StorePHP\Catalog\Http\Livewire\Categories;

use Illuminate\Support\Str;
use Store\Models\Product\Category;
use StorePHP\Bundler\Abstracts\FromAbstract;
use StorePHP\Dashboard\Views\Layouts\DashboardLayout;

class CategoryCreate extends FromAbstract
{
    public $formId = 'storephp_catalog_categories_form';

    protected $pretitle = 'Catalog';
    protected $title = 'Create new category';

    public function layout()
    {
        return DashboardLayout::class;
    }

    public function submit()
    {
        $validateData = $this->validate();

        $validateData['slug'] = Str::slug($validateData['slug'], '-');

        $category = Category::create([
            'parent_id' => $validateData['parent_id'],
            'slug' => $validateData['slug'],
        ]);

        foreach ($this->models(['parent_id', 'slug']) as $model) {
            $category->{$model} = $validateData[$model];
        }

        $category->save();
    }
}
