<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
  protected $table = 'status';

  protected $fillable = ['id_user', 'isi_status'];
}
