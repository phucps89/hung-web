<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/30/2017
 * Time: 11:14 PM
 */

namespace App\Repositories;


use App\Entities\User;
use Prettus\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        // TODO: Implement model() method.
        return User::class;
    }
}