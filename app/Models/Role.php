<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    // Roles
    const ADMIN = 'Admin';
    const USER = 'User';

    public static $roles = [
        self::ADMIN,
        self::USER
    ];
}
