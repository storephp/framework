<?php

namespace Bidaea\OutMart\Dashboard\Models;

use Bidaea\OutMart\Modules\Customers\Models\Customer as ModelCustomer;
use Bidaea\OutMart\Modules\Customers\Traits\WithUserData;

final class Customer extends ModelCustomer
{
    use WithUserData;
}
