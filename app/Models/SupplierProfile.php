<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'username_id',
        'fname',
        'image',
        'logo',
        'email',
        'shopname',
        'cat_group',
        'phone',
        'address'
       
      
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
