<?php

namespace App\Models;

use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory, FileTrait;
    
    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function(Image $image) {
            $image->deleteFile();
        });
    }
}
