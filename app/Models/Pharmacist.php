<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Image;
use App\Models\Service;
use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pharmacist extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    protected $guard ='pharmacist';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'Phone',
        'address',
        'latitude',
        'longitude',
        'status',
        'certificateId',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    

    public function catigories(){
        return $this->hasMany(Category::class);
    }

    public function services(){
        return $this->hasMany(Service::class);
    }

    public function medicines(){
        return $this->hasMany(Medicine::class);
    }

    public function reseive(): MorphOne
    {
        return $this->morphOne(Message::class, 'reseiveable');
    }

    public function send(): MorphOne
    {
        return $this->morphOne(Message::class, 'sendable');
    }
}
