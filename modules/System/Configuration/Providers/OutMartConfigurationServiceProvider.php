<?php

namespace OutMart\Modules\System\Configuration\Providers;

use Livewire\Livewire;
use OutMart\Dashboard\Support\ServiceProvider;
use OutMart\Modules\System\Configuration\Http\Livewire\Configurations;

class OutMartConfigurationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->configurationCreateTab('general', 'General');
        $this->configurationCreateSubTab('general', 'public', 'Public', [
            $this->configurationAddField(
                type:'string',
                label:'Store Name',
                path:'general_public_store_name',
            ),
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // config([
        //     'outmart.system.configurations.tabs' => array_merge([
        //         'general' => [
        //             'name' => 'General',
        //             'sub_tabs' => [
        //                 'general' => [
        //                     'name' => 'General',
        //                     'fields' => [
        //                         [
        //                             'type' => 'string',
        //                             'label' => 'Home',
        //                             'path' => 'general_website_home',
        //                         ],

        //                         [
        //                             'type' => 'string',
        //                             'label' => 'Url',
        //                             'path' => 'general_website_url',
        //                         ],
        //                     ],
        //                 ],
        //                 'general_w2' => [
        //                     'name' => 'General 2',
        //                     'fields' => [
        //                         [
        //                             'type' => 'string',
        //                             'label' => 'Home',
        //                             'path' => 'general_website_home2',
        //                         ],

        //                         [
        //                             'type' => 'string',
        //                             'label' => 'Url',
        //                             'path' => 'general_website_url2',
        //                         ],
        //                     ],
        //                 ],
        //             ],
        //         ],
        //     ], config('outmart.system.configurations.tabs', [])),
        // ]);

        // dd(config(''));

        $this->appendToMenu('outmart_system', [
            $this->addLink(
                icon:'adjustments-alt',
                name:'Configurations',
                route:'outmart.dashboard.system.configurations',
                order:10,
            ),
        ]);

        $this->loadRoutes(__DIR__ . '/..', 'system');
        $this->loadAppViews(__DIR__ . '/..', 'configurations');

        Livewire::component('outmart-system-configurations', Configurations::class);
    }
}
