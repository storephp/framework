<?php

namespace OutMart\Dashboard\Models;

use OutMart\Models\Customer as OurMartCustomer;
use OutMart\Traits\Customers\WithUserData;

final class Customer extends OurMartCustomer
{
    use WithUserData;
}
