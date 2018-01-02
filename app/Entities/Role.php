<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/30/2017
 * Time: 11:22 PM
 */

namespace App\Entities;


use Illuminate\Database\Eloquent\Model;

class Role extends \Spatie\Permission\Models\Role
{
    const ADMIN = 'admin';
}