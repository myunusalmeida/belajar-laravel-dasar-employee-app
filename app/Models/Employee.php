<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'nip', 'date_of_birth', 'place_of_birth',
        'address', 'phone', 'email', 'position_id', 'photo'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
