<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use Auth;
class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $surat = Surat::all();
      return $surat;
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
          'penerima'=>'required',

          'perihal'=> 'required',
        ]);
        $a = 1;
        $data = new Surat;
        $data->penerima = $request->penerima;
        $id = Auth::user()->nim;
        $data->pengirim = $id;
        $data->perihal = $request->perihal;
        $data->isi = $request->isi;
        $data->foto = $request->foto;
        $data->status_surat = $a;

        $data->save();
        return response()->json([
          'data'=> $data,
          'status'=> 'berhasil',
          'message'=> 'data berhasil ditambahkan',
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_masuk($id)
    {
      $tutorial= Surat::find($id);

      if(!$tutorial)
        return response()->json([
          'error' =>'id tutorial tidak ditemukan'
        ],404);
        return $tutorial;
        //
    }
    public function keluar(){
      $id = Auth::user()->nim;
      $data= Surat::where('pengirim',$id)->get();
      if(!$data)
      return response()->json([
        'error'=>'id tidak ditemukan'
      ],404);
      return $data;
    }
    public function masuk(){
      $id = Auth::user()->nim;
      $data= Surat::where(['penerima'=>$id,'status_surat'=>1])->get();
      if(!$data)
      return response()->json([
        'error'=>'id tidak ditemukan'
      ],404);
      return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
