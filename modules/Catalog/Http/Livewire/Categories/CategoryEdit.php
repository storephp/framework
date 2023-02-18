<?php

namespace OutMart\Modules\Catalog\Http\Livewire\Categories;

use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use OutMart\Dashboard\Builder\Contracts\hasCreateFields;
use OutMart\Dashboard\Builder\FormBuilder;
use OutMart\Models\Product\Category;
use OutMart\Modules\Catalog\Events\AddFieldsToCategoryUpdate;

class CategoryEdit extends FormBuilder  implements hasCreateFields
{
    use LivewireAlert;

    public $pagePretitle = 'Catalog';
    public $pageTitle = 'Update this category';

    public $category;

    public $parent_id;
    public $name;
    public $slug;

    protected $rules = [
        'parent_id' => 'nullable',
        'name' => 'required',
        'slug' => 'required',
    ];

    public function mount(Category $category)
    {
        $this->category = $category;

        $this->parent_id = $this->category->parent_id;
        $this->name = $this->category->name;
        $this->slug = $this->category->slug;
    }

    public function createFields()
    {
        $this->form->addField([
            'label' => 'Parent category',
            'type' => 'select',
            'model' => 'parent_id',
            'options' => Category::pluck('name', 'id'),
            'rules' => 'nullable',
            'order' => 1,
            'hint' => 'You can not select.'
        ]);

        $this->form->addField([
            'label' => 'Name category',
            'type' => 'text',
            'model' => 'name',
            'rules' => 'required',
            'order' => 10,
            // 'hint' => 'dsf dsf dsff'
        ]);

        $this->form->addField([
            'label' => 'Slug category',
            'type' => 'text',
            'model' => 'slug',
            'rules' => 'required',
            'order' => 20,
        ]);

        AddFieldsToCategoryUpdate::dispatch($this->form);
    }

    public function buildSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $validatedData['slug'] = Str::slug($validatedData['slug'], '-');

        $this->category->update($validatedData);

        return $this->alert('success', 'Updated!');
    }
}
