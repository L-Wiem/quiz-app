<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Ensure this is imported


class Question extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'question_text', 'correct_answer', 'options'];

    protected $casts = [
        'options' => 'array', // Store multiple-choice options
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
