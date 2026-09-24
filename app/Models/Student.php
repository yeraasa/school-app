<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    use HasFactory;
    protected $fillable = [
    'nis', 'nama', 'tanggal_lahir', 'gender', 'alamat', 'email', 'school_class_id'];

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }

}
