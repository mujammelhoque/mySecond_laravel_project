<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = [
           
            'name','shopname','description','slug','sku', 'title','fimage','image','attr','cat_id','subcat_id',
            'inventory_id',
            'price','oldprice' ,'status','wstatus','warrenty','alert','discount','quantity','qtytext','size','username_id'
    ];

    protected $dates = ['deleted_at'];
    public function orders()
    {
        return $this->hasMany(Order::class);
 
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    public function sub__categories()
    {
        return $this->belongsTo(Sub_Category::class);
    }

}

