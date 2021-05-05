<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class Customer extends Model
{
    use HasFactory;

    public $fillable = ['username', 'email'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
