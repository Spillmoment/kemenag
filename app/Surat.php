<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = ['file', 'keterangan'];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
