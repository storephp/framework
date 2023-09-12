<?php

namespace StorePHP\System\Configuration\Http\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Store\Facades\Configuration;
use StorePHP\Bundler\Facades\Bundles;
use StorePHP\Dashboard\Views\Layouts\DashboardLayout;

class Configurations extends Component
{
    use LivewireAlert;

    public $currentTab;
    public $currentSubTab;
    public $fields;
    public $storeViewId = null;

    public function mount($currentTab = 'general', $currentSubTab = 'public')
    {
        $this->fields = Bundles::getTabsFieldsConfiguration($currentSubTab);

        foreach ($this->fields as $field) {
            $this->{$field['model']} = Configuration::setStoreViewId($this->storeViewId)->get($field['model']);
        }
    }

    public function render()
    {
        return view('storephp-system-configuration::configurations', [
            'tabs' => Bundles::getTabsConfiguration(),
            'currentTabName' => $this->currentTab,
            'fields' => $this->fields,
        ])->layout(DashboardLayout::class);
    }

    public function submitSave()
    {
        foreach ($this->fields as $field) {
            Configuration::setStoreViewId($this->storeViewId)->set($field['model'], $this->{$field['model']});
        }

        $this->alert('success', 'Save!!', [
            'position' => 'top-end',
            'timer' => 5000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }
}
