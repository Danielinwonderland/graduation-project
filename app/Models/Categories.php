<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    
    public function tasks()
    {
        return $this->hasMany(Tasks::class, 'category');
    }
    
    public function latestTask() {
        return $this->hasOne(Tasks::class)->latest();
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
