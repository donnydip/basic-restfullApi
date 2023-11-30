<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AddressStore extends Model
{
    use HasFactory;

    protected $table = "address_stores";
    protected $fillable = ['customer_id','address','district','city','province','postal_code',];

    public function customer_stores(): BelongsTo
    {
        return $this->belongsTo(CustomerStore::class, 'customer_id');
    }
}
