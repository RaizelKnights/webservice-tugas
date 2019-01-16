<?php

namespace App\Http\Controllers;

use App\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->judul) {
            $buku = Buku::where('judul', 'like', '%'.$request->judul.'%')->get();
        } else {
            $buku = Buku::all();
        }

        return response()->json(['message' => 'Success', 'data' => $buku], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'penerbit' => 'required',
            'penulis' => 'required',
            'isbn' => 'required',
            'harga' => 'required',
            'tahun' => 'required',
            'sinopsis' => 'required',
            ]);
        $errors = $validator->errors()->toArray();
        if ($validator->fails()) {
            return response()->json(array('errors' => $errors), 401);
        }
        $input = $request->all();
        $buku = Buku::create($input);
        $message = 'Berhasil Membuat Data Buku!';

        return response()->json(['message' => $message], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Buku $buku
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        return response()->json(['message' => 'Success', 'data' => $buku], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Buku $buku
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Buku                $buku
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'penerbit' => 'required',
            'penulis' => 'required',
            'isbn' => 'required',
            'harga' => 'required',
            'tahun' => 'required',
            'sinopsis' => 'required',
            ]);
        $errors = $validator->errors()->toArray();
        if ($validator->fails()) {
            return response()->json(array('errors' => $errors), 401);
        }
        $buku->update($request->all());
        $message = 'Berhasil Mengubah Data Buku!';

        return response()->json(['message' => $message], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Buku $buku
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
        $message = 'Berhasil Menghapus Data';

        return response()->json(['message' => $message], 200);
    }
}
