<?php
namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;
class KategoriController extends Controller {
 public function index(){ return view('kategori.index',['items'=>Kategori::latest()->get()]); }
 public function create(){ return view('kategori.form',['item'=>new Kategori()]); }
 public function store(Request $r){$d=$r->validate(['kode'=>'required|max:20|unique:kategoris,kode','nama'=>'required|max:255|unique:kategoris,nama']);Kategori::create($d);return redirect()->route('kategori.index')->with('success','Kategori berhasil ditambahkan.');}
 public function edit(Kategori $kategori){return view('kategori.form',['item'=>$kategori]);}
 public function update(Request $r,Kategori $kategori){$d=$r->validate(['kode'=>'required|max:20|unique:kategoris,kode,'.$kategori->id,'nama'=>'required|max:255|unique:kategoris,nama,'.$kategori->id]);$kategori->update($d);return redirect()->route('kategori.index')->with('success','Kategori berhasil diperbarui.');}
 public function destroy(Kategori $kategori){$kategori->delete();return back()->with('success','Kategori berhasil dihapus.');}
}
