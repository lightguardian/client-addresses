<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false;

    protected $table = 'clients';

    protected $fillable = 
    [
        'trade_name',
        'legal_name',
        'cnpj',
    ];
}
