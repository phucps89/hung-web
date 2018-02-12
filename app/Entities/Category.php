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
    protected $fillable = [
        'name',
        'title',
        'tags',
        'description',
        'image',
        'parent'
    ];
    function sub(){
        return $this->hasMany(self::class, 'parent');
    }

    function top(){
        return $this->belongsTo(self::class, 'parent');
    }

    function setTagsAttribute(array $raw){
        $this->attributes['tags'] = json_encode($raw);
    }

    function getTagsAttribute(){
        return json_decode($this->attributes['tags'], true);
    }
}