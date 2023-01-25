<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\item;

class category extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $table = 'category';

    public function item(){
        return $this->hasMany(item::class, 'category_id');
    }
}
