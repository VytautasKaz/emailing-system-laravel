<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Tag extends Model
{
    use HasFactory;

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
