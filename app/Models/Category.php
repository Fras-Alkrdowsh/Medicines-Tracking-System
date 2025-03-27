<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Medicine;
use App\Models\Pharmacist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Category extends Model
{
    protected $fillable = ['name','description' ,'pharmacist_id'];
    public function pharmacy(){
        return $this->belongsTo(Pharmacist::class);
    }
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function medicines(){
        return $this->hasMany(Medicine::class);
    }
}
