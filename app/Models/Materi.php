<?php

namespace App\Models;

use App\Models\ItemMateri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
    ];
    protected $guarded = ['id'];

    public function ItemMateri(){
        return $this->hasMany(ItemMateri::class);
    }
}
