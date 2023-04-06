<?php

namespace Basketin\Dashboard\Http\Livewire\Account;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Basketin\Dashboard\Views\Layouts\AuthLayout;

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
        return view('basketin::account.login')->layout(AuthLayout::class);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        if (Auth::guard('basketin')->attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']], $validatedData['remember'])) {
            return redirect(route('basketin.dashboard.home'));
        }
    }
}
