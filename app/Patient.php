<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
protected $table='patients';
public $primarykey='patient_id';
public $timestamp=false;
protected $fillable=['patient_name','patient_email']; 
}
