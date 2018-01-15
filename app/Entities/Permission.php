<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/30/2017
 * Time: 11:38 PM
 */

namespace App\Entities;



class Permission extends \Spatie\Permission\Models\Permission
{
    const MANAGE_USER = 'manage_user';
    const MANAGE_SIZE = 'manage_size';
    const MANAGE_COLOR = 'manage_color';
    const MANAGE_CATEGORY = 'manage_category';
}