<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creditor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected function casts()
    {
        return [
            'created_at' => 'datetime:d/m/Y',
            'updated_at' => 'datetime:d/m/Y'
        ];
    }
}
