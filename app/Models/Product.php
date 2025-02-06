<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['productNameEnglish','productNameFrance','productDescriptionEnglish','productDescriptionFrance','GTIN','productBrandName','productCountryOfOrigin','productGross','productNet','productUnit','productImage','productStatus','companyId'];
    protected $primaryKey = 'GTIN';
    public $timestamps = false;
    function Company(){
        return $this->belongsTo(Company::class,'companyId');
    }
}
