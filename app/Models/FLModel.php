<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FLModel extends Model {
    use HasFactory;

    protected $table = 'models';

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
