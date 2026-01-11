<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @var string $table */
    protected $table = 'students';

    /** @var list<string> $fillable */
    protected $fillable = [
        'name',
        'cpf'
    ];

}
