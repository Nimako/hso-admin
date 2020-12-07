<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table       = 'transaction';

    protected $primaryKey  = 'ID';

    //protected $casts       = ['id' => 'string'];

    const CREATED_AT       = 'DateCreated';
    const UPDATED_AT       = null;


}
