<?php

use StorePHP\Bundler\Lib\ACL;

return new class
{
    public function permissions(ACL $acl)
    {
        $acl->permission('Catalog', 'catalog');
    }
};
