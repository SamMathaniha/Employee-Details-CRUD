<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

   /*  protected $fillable = [
        'name',
        'email',
        'joining_date',
        'salary',
        'is_active',
    ]; */

    // not for mass assignment
    protected $guarded = [];
}
