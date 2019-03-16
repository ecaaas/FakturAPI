<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class TFakturController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'harga' => 'required',
            'qty' => 'required',
            'total' => 'required'
        ]);
        if ($validator->fails()) {
            $erros = $validator->errors();
            return [
                'status' => 'error',
                'message' => $erros,
                'result' => null
            ];
        }
        $result = \App\TFaktur::create($request->all());
        if ($result) {
            return [
                'status' => 'success',
                'message' => 'Data Berhasil ditambahkan',
                'result' => $result
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Data Gagal ditambahkan',
                'result' => null
            ];
        }
    }

    public function all()
    {
        $result = \App\TFaktur::all();
        return [
            'status' => 'success',
            'message' => '',
            'result' => $result
        ];
    }

    public function detail($id)
    {
        $result = \App\TFaktur::where('id', '=', $id)->get();
        return [
            'status' => 'success',
            'message' => '',
            'result' => $result
        ];
    }

    public function put(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'harga' => 'required',
            'qty' => 'required',
            'total' => 'required'
        ]);
        if ($validator->fails()) {
            $erros = $validator->errors();
            return [
                'status' => 'error',
                'message' => $erros,
                'result' => null
            ];
        }
        $kelas = \App\TFaktur::find($id);
        if (empty($kelas)) {
            return [
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
                'result' => null
            ];
        }
        $result = $kelas->update($request->all());
        if($result){
            return [
                'status'=>'success',
                'message'=> 'Data Berhasil Diubah',
                'result'=>null
            ];
        } else{
            return [
                'status'=> 'error',
                'message' =>'Data Gagal diubah',
                'result'=> null
            ];
        }
    }

    public function remove($id)
    {
        $kelas = \App\TFaktur::find($id);
        if (empty($kelas)) {
            return [
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
                'result' => null
            ];
        }
        $result = $kelas->delete($id);
        if($result){
            return [
                'status'=>'success',
                'message'=> 'Data Berhasil Dihapus',
                'result'=>null
            ];
        } else{
            return [
                'status'=> 'error',
                'message' =>'Data Gagal Dihapus',
                'result'=> null
            ];
        }
    }
}
