<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['contactName','contactNumber','contactEmail','companyId'];
    protected $primaryKey = 'contactId';
    public $timestamps = false;
}
