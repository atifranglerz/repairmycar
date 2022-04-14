<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorBid extends Model
{
    use HasFactory;

    protected $fillable = [
        'garage_id', 'user_bid_id', 'price', 'status',
    ];
}
