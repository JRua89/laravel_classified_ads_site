<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
   use NodeTrait;

   protected $fillable = ['name', 'slug'];

   public function getRouteKeyName()
   {
        return 'slug';
   }
}
