<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Medicine extends Model
{
    protected $fillable = ['name', 'description', 'expirationDate', 'quantity', 'category_id','pharmacist_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function alternatives()
    {
        return $this->belongsToMany(Medicine::class, 'medicine_alternatives', 'medicine_id', 'alternative_id');
    }
    public function pharmacy(){
        return $this->belongsTo(Pharmacist::class);
    }
}
