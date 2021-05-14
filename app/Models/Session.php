<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SessionType;
use App\Models\Method;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'microcycle_id',
        'session_type_id',
        'name',
        'info',
        'start_session',
        'end_session',
    ];

    public function session_type()
    {
        return $this->belongsTo(SessionType::class, 'session_type_id');
    }

    public function methods()
    {
        return $this->belongsToMany(Method::class);
    }
}
