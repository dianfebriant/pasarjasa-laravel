<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Technician extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['category_id', 'name',  'address', 'telephone', 'image'];

    public function Category() {
        return $this->belongsTo(Category::Class,);
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
        if ($this->image && file_exists(public_path('uploads/teknisi/' . $this->image)))
            return asset('uploads/teknisi/' . $this->image);
        else
            return asset('images/no_image.png');
    }

    function delete_image()
    {
        if ($this->image && file_exists(public_path('uploads/teknisi/' . $this->image)))
            return unlink(public_path('uploads/teknisi/' . $this->image));
    }
}
