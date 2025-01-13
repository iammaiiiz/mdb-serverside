<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['productName','GTIN','productDescription','productBrandName','productCountryOfOrigin','productGross','productNet','productUnit','productImage','productStatus','companyId'];
    protected $primaryKey = 'productId';
    public $timestamps = false;
}
