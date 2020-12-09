<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = false;

    protected $table = 'addresses';

    protected $fillable =
    [
        'client_id',
        'road',
        'neighborhood',
        'house_number',
        'cep',

    ];

}
