<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    /**
     * Get the users of the role.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
