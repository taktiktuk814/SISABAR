<?php
namespace App\Http\Controllers;
use App\Models\{Barang,Kategori,Satuan};
use Illuminate\Http\Request;
class BarangController extends Controller {
 public function index(){return view('barang.index',['items'=>Barang::with(['kategori','satuan'])->latest()->get()]);}
 public function create(){return view('barang.form',['item'=>new Barang(),'kategoris'=>Kategori::orderBy('nama')->get(),'satuans'=>Satuan::orderBy('nama')->get()]);}
 public function store(Request $r){$d=$r->validate(['kode_barang'=>'required|max:50|unique:barangs,kode_barang','nama_barang'=>'required|max:255','kategori_id'=>'required|exists:kategoris,id','satuan_id'=>'required|exists:satuans,id','stok'=>'required|integer|min:0','stok_minimum'=>'required|integer|min:0','keterangan'=>'nullable']);Barang::create($d);return redirect()->route('barang.index')->with('success','Barang berhasil ditambahkan.');}
 public function edit(Barang $barang){return view('barang.form',['item'=>$barang,'kategoris'=>Kategori::orderBy('nama')->get(),'satuans'=>Satuan::orderBy('nama')->get()]);}
 public function update(Request $r,Barang $barang){$d=$r->validate(['kode_barang'=>'required|max:50|unique:barangs,kode_barang,'.$barang->id,'nama_barang'=>'required|max:255','kategori_id'=>'required|exists:kategoris,id','satuan_id'=>'required|exists:satuans,id','stok'=>'required|integer|min:0','stok_minimum'=>'required|integer|min:0','keterangan'=>'nullable']);$barang->update($d);return redirect()->route('barang.index')->with('success','Barang berhasil diperbarui.');}
 public function destroy(Barang $barang){$barang->delete();return back()->with('success','Barang berhasil dihapus.');}
}
