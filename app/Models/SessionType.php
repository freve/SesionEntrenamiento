<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Session;

class SessionType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
