<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    // The table associated with the model
    protected $table = 'designations';

    // Define relationship with User
    public function users()
    {
        return $this->hasMany(User::class, 'fk_designation');
    }
}
