<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table="tbl_invoice";
    public $timestamps=false;
}
