<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'prowoner_id',
        'username_id',
        'name',
        'email',
        'phone',
        'price',
        'servicecost',
        'product_id',
        'district_id',
        'subdistrict_id',
        'union_id',
        'addressC',
        'addressU',
        'status',
        'product_name',
        'image',
        'transaction_id',
        'payment',
        'quantity',
        'total',
        'sku',
        'optinonB',
    ];

    protected $dates = ['deleted_at'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'username_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function sub_district()
    {
        return $this->belongsTo(Sub_District::class);
    }
    public function union()
    {
        return $this->belongsTo(Union::class);
    }


}
