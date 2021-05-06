<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recycle extends Model
{
    use HasFactory;

    protected $table ='recycles';

    protected $fillable =["week_day" , "startTime", "endTime", "type"];

}
