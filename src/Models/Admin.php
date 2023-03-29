<?php

namespace OutMart\Dashboard\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OutMart\Team\Traits\IsMember;

class Admin extends Authenticatable
{
    use Notifiable, IsMember;

    protected $table = 'outmart_admins';
}
