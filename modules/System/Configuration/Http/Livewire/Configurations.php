<?php

namespace OutMart\Modules\System\Configuration\Http\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use OutMart\Dashboard\Views\Layouts\DashboardLayout;
use OutMart\Facades\Configuration;

class Configurations extends Component
{
    use LivewireAlert;

    public $currentTab;
    public $currentSubTab;
    public $fields;
    public $storeViewId = null;

    public function mount($currentTab = 'general', $currentSubTab = 'public')
    {
        $configuration = config('outmart.system.configurations.tabs.' . $currentTab . '.sub_tabs.' . $currentSubTab);

        if (!$configuration) {
            abort(404);
        }

        $this->fields = $configuration['fields'];

        foreach ($this->fields as $field) {
            $this->{$field['path']} = Configuration::setStoreViewId($this->storeViewId)->get($field['path']);
        }
    }

    public function render()
    {
        $tabs = config('outmart.system.configurations.tabs');

        return view('outmartConfigurations::configurations', [
            'tabs' => $tabs,
            'currentTabName' => config('outmart.system.configurations.tabs.' . $this->currentTab . '.sub_tabs.' . $this->currentSubTab . '.name'),
            'fields' => $this->fields,
        ])->layout(DashboardLayout::class);
    }

    public function submitSave()
    {
        foreach ($this->fields as $field) {
            // dd($field['path'], $this->{$field['path']});
            Configuration::setStoreViewId($this->storeViewId)->set($field['path'], $this->{$field['path']});
            // dd($this->{str_replace('.', '_', $field['path'])});
        }
    }
}
