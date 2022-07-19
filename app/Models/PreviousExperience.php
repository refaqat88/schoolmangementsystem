<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousExperience extends Model
{
    protected $table = "prev_experience";
    public $timestamps = false;
    protected $primaryKey = 'prev_exper_Id';
    protected $fillable = [
        'prev_exper_Org',
        'prev_exper_Position',
        'prev_exper_Role',
        'prev_Frmdate',
        'prev_Todate',
        'user_id',
        'exp_file'

    ];
    use HasFactory;
}
