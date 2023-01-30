<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard_name = 'admin';

    protected $guarded = [];
}
