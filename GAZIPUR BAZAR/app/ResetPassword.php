<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    protected $table="tbl_password_resets";
    public $timestamps=false;
}
