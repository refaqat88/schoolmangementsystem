<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicQualification extends Model
{
    protected $table = "academic_qualification";
    public $timestamps = false;
    protected $primaryKey = 'acdm_qual_Id';
    
    protected $fillable = [
        'title',
        'univ_Id',
        'sub_Id',
        'user_id',
        'session',
        'grade_Id',
        'acdm_Gpa',
        'type',
        'degree_file'

    ];
    use HasFactory;

    public function university()
    {
        return $this->belongsTo(Board::class, 'univ_Id', 'pk_board_Id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'sub_Id', 'sub_Id');
    }
    public function grade()
    {
        return $this->belongsTo(Grade_general::class, 'grade_Id', 'id');
    }
    public function board()
    {
        return $this->belongsTo(Board::class, 'univ_Id', 'pk_board_Id');
    }
}
