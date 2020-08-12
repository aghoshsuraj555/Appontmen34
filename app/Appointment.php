<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
protected $table='appointments';
public $primarykey='appointment_id';
public $timestamp=false;
protected $fillable=['patient_id','appointment_start_time','appointment_end_time','appointment_title']; 
}
