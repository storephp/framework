<?php

namespace OutMart\Modules\Catalog\Http\Livewire\Categories;

use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use OutMart\Dashboard\Builder\Contracts\hasGenerateFields;
use OutMart\Dashboard\Builder\FormBuilder;
use OutMart\Models\Product\Category;
use OutMart\Modules\Catalog\Events\CategoryCreated;

class CategoryCreate extends FormBuilder implements hasGenerateFields
{
    use LivewireAlert;

    public $pagePretitle = 'Catalog';
    // public $pageTitle = 'Create new category';

    // protected $generatePath = 'catalog.categories.create';

    public $slug;

    // public $defaultTab = 'basic.id';

    // public function buildSlug()
    // {
    //     $this->slug = Str::slug($this->name, '-');
    // }

    // protected function generateTabs($tabs)
    // {
    //     // $tabs->addTab([
    //     //     'id' => 'basic.id',
    //     //     'name' => 'basic info',
    //     // ]);
    // }

    public function generateFields($form)
    {        
        $form->addField('select', [
            // 'tab' => 'basic.id',
            'label' => 'Parent category',
            'model' => 'parent_id',
            'options' => Category::pluck('name', 'id'),
            'rules' => 'nullable',
            'order' => 1,
            'hint' => 'You can not select.',
        ]);

        $form->addField('text', [
            // 'tab' => 'basic.id',
            'label' => 'Name category',
            'model' => 'name',
            'rules' => 'required',
            'order' => 10,
            'hint' => 'dsf dsf dsff',
        ]);

        $form->addField('text', [
            // 'tab' => 'basic.id',
            'label' => 'Slug category',
            'model' => 'slug',
            'rules' => 'required',
            'order' => 20,
        ]);

        // AddFieldsToCategoryCreate::dispatch($this->form);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $validatedData['slug'] = Str::slug($validatedData['slug'], '-');

        $category = Category::create($validatedData);

        CategoryCreated::dispatch($category, $this->form);

        return $this->alert('success', 'Saved!');
    }

    protected function pageTitle()
    {
        return __('OutMartCatalog::category.create');
    }
}
