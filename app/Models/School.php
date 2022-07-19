<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = "schools";
    public $timestamps = false;
    protected $primaryKey = 'pk_school_Id';

    use HasFactory;




    public function photo()
    {
       
        if (file_exists( public_path('/upload/school/').$this->school_logo) && $this->school_logo!='') {
            
            return asset('upload/school/'.$this->school_logo);
        } else {
            return asset('upload/school/document1617974051.png');
        }
    
    }




    public function domicile()
    {

        return $this->belongsTo(Domicile::class, 'dom_Id', 'dom_Id');
    } 


    public function board()
    {

        return $this->belongsTo(Board::class, 'board_Id', 'pk_board_Id');
    } 

    public function city()
    {

        return $this->belongsTo(City::class, 'city_Id', 'pk_city_id');
    }  


}
