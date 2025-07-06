<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
    /** @use HasFactory<\Database\Factories\TodoItemFactory> */
    use HasFactory;

    public $fillable = [
        'note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
