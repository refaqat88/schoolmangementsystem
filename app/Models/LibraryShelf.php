<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryShelf extends Model
{
    protected $table = "library_shelf";
    public $timestamps = false;
    protected $primaryKey = 'shelf_Id';
    use HasFactory;


    public function rack()
    {
        return $this->hasOne(LibraryRack::class, 'rack_Id', 'rack_Id');
    }


     
}
