<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';


    protected $fillable = ['nama','no_telepon','alamat','tanggal_pesanan','jenis_layanan','status_pesanan',];
}
