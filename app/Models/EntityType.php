<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityType extends Model
{
    protected $table = "entity_type";
    public $timestamps = false;
    protected $primaryKey = 'ent_typ_Id';
    use HasFactory;
}
