<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    protected $casts = [
        'variation_type_options_ids' => 'json'
    ];

}
