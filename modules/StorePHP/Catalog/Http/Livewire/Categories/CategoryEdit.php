<?php

namespace Modules\StorePHP\Catalog\Http\Livewire\Categories;

use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use StorePHP\Dashboard\Builder\Contracts\hasGenerateFields;
use StorePHP\Dashboard\Builder\Contracts\hasGenerateTabs;
use StorePHP\Dashboard\Builder\FormBuilder;
use Store\Models\Product\Category;
use Store\Modules\Catalog\Support\Facades\CategoryForm;
use Store\Modules\Catalog\Support\Facades\CategoryFormTabs;

class CategoryEdit extends FormBuilder implements hasGenerateTabs, hasGenerateFields
{
    use LivewireAlert;
    use WithFileUploads;

    protected $pagePretitle = 'Catalog';
    protected $pageTitle = 'Update this category';
    protected $submitLabel = 'Update';

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
        $this->category = $category->setStoreViewId($this->storeViewId);

        $this->parent_id = $this->category->parent_id;
        $this->name = $this->category->name;
        $this->slug = $this->category->slug;

        foreach (CategoryForm::getFields() as $field) {
            $this->{$field['model']} = $this->category->{$field['model']};
        }
    }

    public function changeStoreViewId()
    {
        $this->category = $this->category->setStoreViewId($this->storeViewId);

        $this->name = $this->category->name;
    }

    public function generateTabs($tabs)
    {
        $tabs->addTab([
            'id' => 'basic',
            'name' => 'Basic info',
        ]);

        $tabs->mergeTabs(CategoryFormTabs::getTabs());
    }

    public function generateFields($form)
    {
        $form->addField('select', [
            // 'tab' => 'basic.id',
            'label' => 'Parent category',
            'model' => 'parent_id',
            'options' => Category::get()->map(function ($category) {
                return [
                    'label' => $category->name,
                    'value' => $category->id,
                ];
            }),
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

        $form->mergeFields(CategoryForm::getFields());

        // AddFieldsToCategoryCreate::dispatch($this->form);
    }

    public function buildSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $category = $this->category;

        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug'], '-');

        if ($validatedData['parent_id'] == 'remove') {
            $validatedData['parent_id'] = null;
        }

        foreach (CategoryForm::getFields() as $field) {
            $category->{$field['model']} = $this->{$field['model']};
        }

        $category->save();

        return $this->alert('success', 'Updated!');
    }
}
