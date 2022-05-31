<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\ItemMateri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MateriController extends Controller
{
    public function index($id)
    {
        return view('materi', [
            $materi = Materi::find($id),
            'nama' => $materi->materi,
            $itemmateris = ItemMateri::where('materi_id', '=', $id)->get(),
            'itemmateris' => $itemmateris,
            'title' => 'Materi'
        ]);
    }
}
