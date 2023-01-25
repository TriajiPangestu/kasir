<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\transaction;
use App\Models\item;

class transactionDetail extends Model
{
    protected $guard=[];
    protected $table='transaction_detail';

    use HasFactory;

    public function transaction() {
        return $this->belongsTo(transaction::class);
    }

    public function item() {
        return $this->belongsTo(item::class);
    }
}
