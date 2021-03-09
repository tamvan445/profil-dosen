<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'nidn',
        'photo',
        'college_id',
        'study_program',
        'gender',
        'last_education'
    ];

    public function college()
    {
        return $this->belongsTo(College::class);
    }
}
