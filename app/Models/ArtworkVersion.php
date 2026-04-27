<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtworkVersion extends Model
{
    public $fillable = [
        'approved',
        'rejected',
        'times',
    ];
}
