<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'number',
        'user_id',
        'address',
        'linkedin',
        'skills',
        'achievements',
        'graduation_year',
        'program',
        'occupation',
    ];

    /**
     * The user associated with the profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
