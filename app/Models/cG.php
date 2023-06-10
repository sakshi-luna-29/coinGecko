<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class cG extends Model
{
    use HasFactory;
    protected $table = 'coins';
    protected $fillable = [
        'id', 'name', 'symbol', 'platforms', 'coin_id'
    ];
}
