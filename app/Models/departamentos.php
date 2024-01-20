<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class departamentos extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey = 'idd';
    protected $fillable =['idd','nombre'];
}
