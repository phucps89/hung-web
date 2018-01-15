<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 1/13/2018
 * Time: 10:49 AM
 */

namespace App\Repositories;


use App\Entities\Category;
use Prettus\Repository\Eloquent\BaseRepository;

class CategoryRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        // TODO: Implement model() method.
        return Category::class;
    }
}