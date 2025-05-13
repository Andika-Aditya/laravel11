<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    //
    use HasFactory;

    protected $fillable = ['slug', 'namaKaryawan', 'tglLahir', 'shif'];

    public static function totalKaryawan()
    {
        return self::count();
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sales::class, 'employee_id');
    }
}