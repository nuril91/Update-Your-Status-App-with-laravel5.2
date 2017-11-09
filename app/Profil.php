<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
  protected $table = 'users';

  protected $fillable = ['name', 'email', 'password', 'foto'];
}
