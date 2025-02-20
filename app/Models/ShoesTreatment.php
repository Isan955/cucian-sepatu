<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoesTreatment extends Model
{
    use HasFactory;

    protected $table = 'shoes_treatment';
    protected $primaryKey = 'id_pemesanan';

    protected $fillable = [
        'nama', 'alamat_lengkap', 'no_hp', 'email', 'pickup_delivery',
        'tanggal_jam_pickup', 'jumlah_sepatu', 'service', 'note', 'progress'
    ];
}
