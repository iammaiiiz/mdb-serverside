<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'companyId';
    public $timestamps = false;
    function Contact(){
        return $this->hasOne(Contact::class,'companyId');
    }
    function Owner(){
        return $this->hasOne(Owner::class,'companyId');
    }
    function Product(){
        return $this->hasMany(Product::class,'companyId');
    }
}
