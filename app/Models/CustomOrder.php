<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomOrder extends Model
{
   protected $fillable = ['nama', 'catatan', 'jenis', 'desain'];

}
