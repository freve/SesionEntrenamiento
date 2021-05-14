<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Session;

class Method extends Model
{
    use HasFactory;

    protected $fillble = [
        'name',
        'info',
        'intensity',
        'duration', 
        'charge',
        'is_private'
    ];

    public function sessions()
    {
        return $this->belongsToMany(Session::class);
    }
}
