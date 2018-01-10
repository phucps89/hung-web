<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 1/10/2018
 * Time: 3:31 PM
 */

namespace App\Repositories;


use App\Entities\Color;
use Prettus\Repository\Eloquent\BaseRepository;

class ColorRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        // TODO: Implement model() method.
        return Color::class;
    }
}