<?php
namespace App\Http\Controllers;
use App\Models\Satuan;
use Illuminate\Http\Request;
class SatuanController extends Controller {
 public function index(){return view('satuan.index',['items'=>Satuan::latest()->get()]);}
 public function create(){return view('satuan.form',['item'=>new Satuan()]);}
 public function store(Request $r){$d=$r->validate(['kode'=>'required|max:20|unique:satuans,kode','nama'=>'required|max:255|unique:satuans,nama']);Satuan::create($d);return redirect()->route('satuan.index')->with('success','Satuan berhasil ditambahkan.');}
 public function edit(Satuan $satuan){return view('satuan.form',['item'=>$satuan]);}
 public function update(Request $r,Satuan $satuan){$d=$r->validate(['kode'=>'required|max:20|unique:satuans,kode,'.$satuan->id,'nama'=>'required|max:255|unique:satuans,nama,'.$satuan->id]);$satuan->update($d);return redirect()->route('satuan.index')->with('success','Satuan berhasil diperbarui.');}
 public function destroy(Satuan $satuan){$satuan->delete();return back()->with('success','Satuan berhasil dihapus.');}
}
