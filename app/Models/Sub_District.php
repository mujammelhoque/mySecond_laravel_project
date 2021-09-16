<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_District extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'district_id',
        'name',
        
        
    ];
    public function district()
    {
        return $this->belongsTo(District::class);
    }


    public function unions()
    {
        return $this->hasMany(Union::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

 

}
