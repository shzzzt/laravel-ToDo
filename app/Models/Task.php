<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model //Task model representing a task entity
{   // Defining fillable attributes for mass assignment
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
    ];
}
