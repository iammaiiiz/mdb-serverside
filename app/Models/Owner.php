<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $fillable = ['ownerName','ownerNumber','ownerEmail','companyId'];
    protected $primaryKey = 'ownerId';
    public $timestamps = false;
}
