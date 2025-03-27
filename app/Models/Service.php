<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'description', 'price','type','pharmacist_id','status'];

    public function pharmacy(){
        return $this->belongsTo(Pharmacist::class);
    }
}
