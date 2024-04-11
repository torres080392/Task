<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function users()
    {
        return $this->hasOne(User::class, 'rol_id')->withoutDeleting();
    }
}
