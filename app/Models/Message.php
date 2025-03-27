<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Message extends Model
{
    protected $fillable = ['subject', 'message','receiveable_type','receiveable_id','sendable_type','sendable_id'];
    public function reseiveable(): MorphTo
    {
        return $this->morphTo();
    }
    public function sendable(): MorphTo
    {
        return $this->morphTo();
    }
}
