<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    protected $table="tbl_extra";
    protected $primaryKey="tbl_extra_id";
    public $timestamps=false;
}
