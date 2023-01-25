<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;
use App\Models\cart;
use App\Models\transaction;

class item extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $table = 'item'; 
    
    public function category() {
        return $this->belongsTo(category::class);
    }

    public function cart() {
        return $this->hasOne(cart::class, 'item_id');
    }

    public function transaction() {
        return $this->hasManyThrough(transaction::class, transactionDetail::class);
    }
}
