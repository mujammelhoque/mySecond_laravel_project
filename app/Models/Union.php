<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'subdist_id',
        'name',
        
        
    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function sub_district()
    {
        return $this->belongsTo(Sub_District::class);
    }

  


}
