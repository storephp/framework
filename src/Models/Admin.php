<?php

namespace Basketin\Dashboard\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OutMart\Team\Traits\IsMember;

class Admin extends Authenticatable
{
    use Notifiable, IsMember;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Create a new instance of the Model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('basketin.database.table_prefix') . $this->getTable());
    }
}
