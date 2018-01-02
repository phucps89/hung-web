<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/30/2017
 * Time: 11:22 PM
 */

namespace App\Entities;


use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    const ADMIN = 'admin';
}