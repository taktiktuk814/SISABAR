<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    protected $fillable = ['kode_barang','nama_barang','kategori_id','satuan_id','stok','stok_minimum','keterangan'];
    public function kategori(): BelongsTo { return $this->belongsTo(Kategori::class); }
    public function satuan(): BelongsTo { return $this->belongsTo(Satuan::class); }
}
