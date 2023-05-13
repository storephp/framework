<?php

namespace Store\Dashboard\Http\Livewire\Account;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Store\Dashboard\Views\Layouts\AuthLayout;

class LoginPage extends Component
{
    public $email;
    public $password;
    public $remember;

    protected function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'remember' => ['nullable'],
        ];
    }

    public function render()
    {
        return view('store::account.login')->layout(AuthLayout::class);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        if (Auth::guard('store')->attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']], $validatedData['remember'])) {
            return redirect(route('store.dashboard.home'));
        }
    }
}
