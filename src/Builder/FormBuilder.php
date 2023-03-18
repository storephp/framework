<?php

namespace OutMart\Dashboard\Builder;

use Livewire\Component;
use OutMart\Dashboard\Builder\Contracts\hasGenerateFields;
use OutMart\Dashboard\Builder\Contracts\hasGenerateTabs;
use OutMart\Dashboard\Builder\Form\Fields;
use OutMart\Dashboard\Builder\Form\Tabs;
use OutMart\Dashboard\Views\Layouts\DashboardLayout;
use OutMart\Modules\Catalog\Events\AddFieldsToCategoryCreate;
use OutMart\Models\Store;

class FormBuilder extends Component
{
    public $storeViewId = null;
    public $selectedTab = 'basic';

    protected $pageTitle = 'Title';
    protected $pagePretitle = 'Pre title';
    protected $submitLabel = 'Submit';
    protected $generatePath = null;
    protected $selectStoreView = false;

    private $form = null;
    private $tabs = null;
    private $formTabs = [];
    private $formFields = [];

    public function boot()
    {
        $this->tabs = new Tabs;
        $this->form = new Fields;

        if ($this instanceof hasGenerateTabs) {
            $this->generateTabs($this->tabs);
        }

        if ($this instanceof hasGenerateFields) {
            $this->generateFields($this->form);
            $fields = $this->form->getFields();

            if ($this->generatePath) {
                AddFieldsToCategoryCreate::dispatch($this->generatePath, $this->form);
            }
        }

        $collection = collect($fields);
        $sorted = $collection->sortBy('order');
        $this->formFields = $sorted->values()->all();

        foreach ($this->formFields as $field) {
            $this->{$field['model']} = $field['value'] ?? null;
        }

        $this->formTabs = $this->tabs->getTabs();

        $formTabs = [];
        foreach ($this->formTabs as $formTab) {
            $fields = collect($this->formFields)->where('tab', $formTab['id']);

            $formTabs[] = [
                'id' => $formTab['id'],
                'name' => $formTab['name'],
                'fields' => $fields->all(),
                'tabs_validate' => $fields->pluck('model')->all(),
            ];
        }

        $this->formTabs = $formTabs;
    }

    protected function rules()
    {
        $data = [];

        foreach ($this->formFields as $field) {
            $data[$field['model']] = $field['rules'];
        }

        return $data;
    }

    public function render()
    {
        $stores = Store::with('views')->get();

        // dd($stores);

        return view('outmart::builder.form', [
            'setup' => [
                'selectStoreView' => $this->selectStoreView,
            ],
            'meta' => [
                'pageTitle' => $this->pageTitle(),
                'submitLabel' => $this->submitLabel,
            ],
            'stores' => $stores,
            'from_tabs' => $this->formTabs,
            // 'fileds' => $this->formFields,
        ])->layout(DashboardLayout::class);
    }

    protected function pageTitle()
    {
        return $this->pageTitle;
    }

    public function setTab($tab)
    {
        $this->selectedTab = $tab;
    }
}
