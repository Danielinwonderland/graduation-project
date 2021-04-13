<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tasks extends Model
{
    use HasFactory;


    public function categoryM()
    {
        return $this->belongsTo(Categories::class, 'category');
    }

}
