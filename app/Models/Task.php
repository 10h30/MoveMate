<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($task) {
            if (is_null($task->completed)) {
                $task->completed = false; // Ensure completed is false when creating a new task
            }
            $task->user_id = Auth::id(); // Set user_id automatically
        });
    }

    /* protected $attributes = [
        'completed' => false, // Set default value for completed
    ]; */


    public function user() {
        return $this->belongsTo(User::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
