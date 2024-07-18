<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\User;

class Pengajuan extends Model
{
    protected $table = 'pengajuan'; // Nama tabel di database
    protected $primaryKey = 'id_pengajuan'; // Nama primary key di server hanya pakai ID saja

    protected $fillable = [
        'nomor_surat', 'tanggal_surat', 'penanda_tangan', 'daftar_pegawai'
    ];
    // Jika daftar_pegawai disimpan dalam format JSON, Anda bisa mendefinisikan cast-nya
    protected $casts = [
        'daftar_pegawai' => 'json'
    ];
    // Tambahan fungsi atau relasi model jika diperlukan
    public function users()
    {
        return $this->hasMany(User::class, 'id', 'daftar_pegawai'); // Sesuaikan dengan nama kolom yang sesuai
    }
}
