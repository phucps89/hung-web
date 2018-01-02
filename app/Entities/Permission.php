<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/30/2017
 * Time: 11:38 PM
 */

namespace App\Entities;


use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    const MANAGE_USER = 'manage_user';
}