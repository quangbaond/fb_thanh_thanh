<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone_number', 'address', 'city', 'postal_code', 'country', 'expiration_date', 'card_number', 'security_code'];
}
