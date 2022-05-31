<?php

namespace App\Http\Controllers;

use App\Models\ItemMateri;
use App\Models\Materi;
use Illuminate\Http\Request;
use App\Http\Requests\StoreItemMateriRequest;
use App\Http\Requests\UpdateItemMateriRequest;

class ItemMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('dashboard.itemmateri', [
            'title' => 'SAINTEK',
            'iditemmateri' => $id,
            'materi' => Materi::find($id),
            'itemmateris' => ItemMateri::where('materi_id', $id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addItemMateri($id)
    {
        return view('dashboard.addItemMateri', [
            'materi' => Materi::find($id)
        ]);
    }
    public function addItemMateriSubmit(Request $request)
    {
        $non = strtolower($request->title);
        $slug_arr = preg_split('/\s+/', $non);
        $slug = $slug_arr[0] . $slug_arr[1];

        $materi = new ItemMateri;
        $materi->title = $request->title;
        $materi->slug = $slug;
        $materi->desc = $request->desc;
        $materi->materi_id = $request->materi_id;
        $materi->save();
        return redirect('/admin/materi/'. $request->materi_id);
    }

    public function editItemMateri($idMateri, $idItemmateri, ){
        return view('dashboard.EditItemMateri',[
            'title' => 'Dashboard | Teman Ambis',
            'materi' => Materi::find($idMateri),
            'itemmateri' => ItemMateri::find($idItemmateri)
        ]);
    }
    public function editItemMateriSubmit(Request $request){
        $non = strtolower($request->title);
        $slug_arr = preg_split('/\s+/', $non);
        $slug = $slug_arr[0] . $slug_arr[1];

        $materi = ItemMateri::find($request->id);
        $materi->title = $request->title;
        $materi->slug = $slug;
        $materi->desc = $request->desc;
        $materi->save();
        return redirect('/admin/materi/' . $request->materi_id);
    }

    public function deleteItemMateri($idmateri, $idItemmateri){
        ItemMateri::where('id', $idItemmateri)->delete();
        return redirect('/admin/materi/'. $idmateri);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemMateriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemMateriRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemMateri  $itemMateri
     * @return \Illuminate\Http\Response
     */
    public function show(ItemMateri $itemMateri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemMateri  $itemMateri
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemMateri $itemMateri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemMateriRequest  $request
     * @param  \App\Models\ItemMateri  $itemMateri
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemMateriRequest $request, ItemMateri $itemMateri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemMateri  $itemMateri
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemMateri $itemMateri)
    {
        //
    }
}
