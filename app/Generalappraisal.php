<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generalappraisal extends Model
{
      protected $fillable = ["ref","userid","code","firstname","lastname","position","department","period","roledesc","favorfactor","constfactor","solution","trainingattended","trainingneeded","satisfywithrole",  "preferroleone","preferroletwo","preferrolethree","comment","status"
    ];
}
