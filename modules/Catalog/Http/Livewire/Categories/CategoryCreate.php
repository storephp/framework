<?php

namespace OutMart\Modules\Catalog\Http\Livewire\Categories;

use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use OutMart\Dashboard\Builder\Contracts\hasCreateFields;
use OutMart\Dashboard\Builder\FormBuilder;
use OutMart\Models\Product\Category;
use OutMart\Modules\Catalog\Events\AddFieldsToCategoryCreate;
use OutMart\Modules\Catalog\Events\CategoryCreated;

class CategoryCreate extends FormBuilder implements hasCreateFields
{
    use LivewireAlert;

    public $pagePretitle = 'Catalog';
    // public $pageTitle = 'Create new category';

    protected $pathFields = 'catalog.categories';

    public $slug;

    public $tab = 'basic.id';

    public function buildSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function createFields()
    {
        $this->tabs->addTab([
            'id' => 'basic.id',
            'name' => 'basic info',
        ]);

        $this->form->addField([
            'tab' => 'basic.id',
            'label' => 'Parent category',
            'type' => 'select',
            'model' => 'parent_id',
            'options' => Category::pluck('name', 'id'),
            'rules' => 'nullable',
            'order' => 1,
            'hint' => 'You can not select.',
        ]);

        $this->form->addField([
            'tab' => 'basic.id',
            'label' => 'Name category',
            'type' => 'text',
            'model' => 'name',
            'rules' => 'required',
            'order' => 10,
            'hint' => 'dsf dsf dsff'
        ]);

        $this->form->addField([
            'tab' => 'basic.id',
            'label' => 'Slug category',
            'type' => 'text',
            'model' => 'slug',
            'rules' => 'required',
            'order' => 20,
        ]);

        AddFieldsToCategoryCreate::dispatch($this->form);
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
