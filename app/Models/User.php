<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'fk_designation');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'fk_department');
    }
}
