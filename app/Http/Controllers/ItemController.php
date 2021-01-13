<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataItem=Item::all()->sortBy('kategori');
        $data=[
            'menu'=>'Master',
            'submenu'=>'item',
            'judul'=>'Data item',
            'isDataTable'=>true,
            'isJS'=>'item.js',
            'dataItem'=>$dataItem
        ];
        return view('item.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $data=[
            'menu'=>'Master',
            'submenu'=>'item',
            'aksi'=>'Tambah item',
            'judul'=>'Data item',
            'isDataTable'=>false,
            'isJS'=>'item.js',
            'data'=>null
        ];
        return view('item.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item=new Item;
        $item->kode=!empty($request->get('kode'))?$request->get('kode'):'';
        $item->item=!empty($request->get('item'))?$request->get('item'):'';
        $item->kategori=!empty($request->get('kategori'))?$request->get('kategori'):'';
        $item->status=!empty($request->get('status'))?$request->get('status'):'';        
        $item->save();
        return redirect()->route('item.index')->with('status', 'data item berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'test '.$id;
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

    public function fatch()
    {
        $item=Item::get();
        return response()->json($item);
    }
}
