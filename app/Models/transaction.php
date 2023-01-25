<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\transactionDetail;

class transaction extends Model
{
    use HasFactory;

    protected $guarded=[];
    
    protected $table = 'transaction';

    public function user() {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function detail() {
        return $this->hasMany(transactionDetail::class, 'transaction_id');
    }
}
