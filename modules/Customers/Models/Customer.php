<?php

namespace Basketin\Modules\Customers\Models;

use Basketin\Models\Customer as OurMartCustomer;
use Basketin\Traits\Customer\WithBasket;

// use Basketin\Traits\Customer\Initialize\WithUserData;

final class Customer extends OurMartCustomer
{
    // use WithUserData;
    use WithBasket;
}
