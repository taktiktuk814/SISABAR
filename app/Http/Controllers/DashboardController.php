<?php
namespace App\Http\Controllers;
use App\Models\{Barang,Kategori,Satuan};
class DashboardController extends Controller {
 public function index(){return view('dashboard',['barang'=>Barang::count(),'stok'=>Barang::sum('stok'),'menipis'=>Barang::whereColumn('stok','<=','stok_minimum')->count(),'kategori'=>Kategori::count(),'satuan'=>Satuan::count()]);}
}
