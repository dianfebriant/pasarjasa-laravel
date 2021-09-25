<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Information extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name',  'body', 'image'];

    public function Sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    function image()
    {
        if ($this->image && file_exists(public_path('uploads/information/' . $this->image)))
            return asset('uploads/information/' . $this->image);
        else
            return asset('images/no_image.png');
    }

    function delete_image()
    {
        if ($this->image && file_exists(public_path('uploads/information/' . $this->image)))
            return unlink(public_path('uploads/information/' . $this->image));
    }
}
