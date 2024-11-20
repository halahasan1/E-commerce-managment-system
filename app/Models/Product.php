<?php


namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description','image', 'price'];

    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_product');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
