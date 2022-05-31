<?php

namespace App\Models;

use App\Models\Materi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemMateri extends Model
{
    use HasFactory;

    public function materi(){
        return $this->belongsTo(Materi::class);
    }
}
