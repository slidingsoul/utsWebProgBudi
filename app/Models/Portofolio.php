<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'gender', 'aboutMe', 'telpNum', 'linkedin', 'instagram', 'user_id', 'skillTitle', 'skillDesc'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
