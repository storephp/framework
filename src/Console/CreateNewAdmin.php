<?php

namespace StorePHP\Dashboard\Console;

use StorePHP\Dashboard\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateNewAdmin extends Command
{
    protected $signature = 'store:admin:new';

    protected $description = 'Create a new administrator';

    public function handle()
    {
        if ($this->confirm('Do you want to create a new administrator?', true)) {

            $name = $this->ask('Admin name?');
            $email = $this->ask('Admin email?');
            $password = $this->secret('Admin password?');

            $admin = Admin::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);

            $admin->membership()->create([
                'rule_id' => 1,
            ]);

            $this->info('A new administrator has been created.');
        }
    }
}
