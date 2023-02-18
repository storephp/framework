<?php

namespace OutMart\Dashboard\Builder;

use Livewire\Component;
use OutMart\Dashboard\Builder\Contracts\hasGenerateFields;
use OutMart\Dashboard\Builder\Contracts\hasGenerateTabs;
use OutMart\Dashboard\Builder\Form\Fields;
use OutMart\Dashboard\Builder\Form\Tabs;
use OutMart\Modules\Catalog\Events\AddFieldsToCategoryCreate;

class FormBuilder extends Component
{
    protected $pageTitle = 'Title';
    protected $pagePretitle = 'Pre title';
    protected $submitLabel = 'Submit';
    protected $defaultTab = 'basic';
    protected $generatePath = null;

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
            $formTabs[] = [
                'id' => $formTab['id'],
                'name' => $formTab['name'],
                'fields' => collect($this->formFields)->where('tab', $formTab['id'])->all(),
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
        return view('outmart::builder.form', [
            'meta' => [
                'pageTitle' => $this->pageTitle(),
            ],
            'tab' => $this->getDefaultTab(),
            'from_tabs' => $this->formTabs,
            'fileds' => $this->formFields,
        ])->layout('outmart::layouts.dashboard');
    }

    protected function pageTitle()
    {
        return $this->pageTitle;
    }

    /**
     * Get the value of defaultTab
     */
    public function getDefaultTab()
    {
        return $this->defaultTab;
    }

    public function setTab($tab)
    {
        $this->defaultTab = $tab;
    }
}
