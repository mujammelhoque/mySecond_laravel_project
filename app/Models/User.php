<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'username',
        'access',
        'email',
        'cat_group',
        'phone',
        'currentaddr',
        'permanentaddr',
        'image',
        'logo',
        'shopname',
        'district_id',
        'subdist_id',
        'union_id',
        'optionA',
        'is_admin',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     *   $table->string('fname');
     * 
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
 
    }
    public function supplier_profiles()
    {
        return $this->hasMany(SupplierProfile::class);
 
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'username_id');
 
    }


}
