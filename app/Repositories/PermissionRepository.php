<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 1/6/2018
 * Time: 1:34 PM
 */

namespace App\Repositories;


use App\Entities\Permission;
use Prettus\Repository\Eloquent\BaseRepository;

class PermissionRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        // TODO: Implement model() method.
        return Permission::class;
    }
}