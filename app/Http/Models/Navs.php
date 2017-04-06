<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Navs extends Model
{
    protected $table = 'navs';
    protected $primaryKey = 'nav_id';
    protected $guarded = [];
    public $timestamps = false;
}
