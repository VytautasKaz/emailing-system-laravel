<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class Customer extends Model
{
    use HasFactory;

    public $fillable = ['username', 'email', 'tag_id'];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
