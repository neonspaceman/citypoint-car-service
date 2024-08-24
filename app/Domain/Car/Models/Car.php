<?php

namespace App\Domain\Car\Models;

use Illuminate\Database\Eloquent\Model;

final class Car extends Model
{
    protected $primaryKey = 'Id';

    protected $table = 'Car';

    public $timestamps = false;

    protected $fillable = [
        'RegNumber',
        'VIN',
        'Model',
        'Brand',
    ];
}
