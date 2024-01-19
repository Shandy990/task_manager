<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'status_id',
        'image_id',
        'title',
        'description',
        'note',
        'published_at',
    ];

    protected static function boot()
    {
        parent::boot();

        static::forceDeleting(function(Task $task) {
            $task->image?->delete();
        });
    }

    public function user():BelongsTo
    {
        return  $this->belongsTo(User::class);
    }

    public function image():BelongsTo
    {
        return  $this->belongsTo(Image::class);
    }
   
    public function status():BelongsTo
    {
        return  $this->belongsTo(Status::class);
    }
    
}
