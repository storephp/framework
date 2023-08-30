<?php

namespace Store\Modules\Customers\Models;

use Store\Models\Customer as OurMartCustomer;
use Store\Traits\Customer\WithBasket;

// use Store\Traits\Customer\Initialize\WithUserData;

final class Customer extends OurMartCustomer
{
    // use WithUserData;
    use WithBasket;
}
