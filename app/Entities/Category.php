<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 1/13/2018
 * Time: 10:49 AM
 */

namespace App\Entities;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    function sub(){
        return $this->hasMany($this->getTable(), 'parent');
    }

    function top(){
        return $this->belongsTo($this->getTable(), 'parent');
    }
}