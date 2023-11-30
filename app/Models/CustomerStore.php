<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;

class CustomerStore extends Model
{
    use HasFactory;

    protected $table = "customer_stores";
    protected $fillable = ['title','name','gender','phone_number','image','email',];

    public function address(): HasMany
    {
        return $this->hasMany(AddressStore::class, 'customer_id', 'id');
    }

    public function toArray()
    {
        $array = parent::toArray();
        $timestamps = Arr::only($array, ['created_at', 'updated_at']);
        $array = Arr::except($array, ['created_at', 'updated_at']);
        $array = array_merge($array, $timestamps);
        
        return $array;
    }
}
