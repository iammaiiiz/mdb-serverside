<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'GTIN';
    public $timestamps = false;
    function Company(){
        return $this->belongsTo(Company::class,'companyId');
    }
}
