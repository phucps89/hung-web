<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 1/10/2018
 * Time: 2:22 PM
 */

namespace App\Repositories;


use App\Entities\Size;
use Prettus\Repository\Eloquent\BaseRepository;

class SizeRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        // TODO: Implement model() method.
        return Size::class;
    }
}