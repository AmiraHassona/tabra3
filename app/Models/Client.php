<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'clients';
    public $timestamps = true;

    protected $fillable = array('name', 'password', 'email', 'phone', 'd_o_b', 'blood_type_id', 'last_donation_date', 'city_id', 'pin_code');

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function posts()
    {
        return $this->morphedByMany('App\Models\Post', 'clientable');
    }

    public function governorates()
    {
        return $this->morphedByMany('App\Models\Governorate', 'clientable');
    }

    public function bloodTypes()
    {
        return $this->morphedByMany('App\Models\BloodType', 'clientable');
    }

    public function notifications()
    {
        return $this->morphedByMany('App\Models\Notification', 'clientable');
    }

}