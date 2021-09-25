<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name', 'image'];
    
    public function Technician() {
        return $this->hasMany(Technician::Class);

    }
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
        if ($this->image && file_exists(public_path('uploads/categories/' . $this->image)))
            return asset('uploads/categories/' . $this->image);
        else
            return asset('images/no_image.png');
    }

    function delete_image()
    {
        if ($this->image && file_exists(public_path('uploads/categories/' . $this->image)))
            return unlink(public_path('uploads/categories/' . $this->image));
    }
}
