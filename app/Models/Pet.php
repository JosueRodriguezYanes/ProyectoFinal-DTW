<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model {
    protected $fillable = ['name', 'species', 'breed', 'age', 'owner_name', 'vaccinated'];
}