<?php

use StorePHP\Bundler\Lib\ACL;
use StorePHP\Bundler\Contracts\ACL\HasPermissions;

return new class implements HasPermissions
{
    public function permissions(ACL $acl)
    {
        $acl->permission('Catalog', 'catalog');
    }
};
