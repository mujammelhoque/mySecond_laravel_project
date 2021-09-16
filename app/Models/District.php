<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'service_cost',
        
        
    ];

    public function sub_districts()
    {
        return $this->hasMany(Sub_District::class);
 
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
 
    }
}
