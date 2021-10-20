<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\User;

class Ekgb extends Model
{
    use HasFactory;
    protected $appends = ['deadline', 'stats', 'nama_pegawai'];
    // Casting untuk datetime
    protected $casts = [
        'kgb_terakhir' => 'datetime:Y-m-d',
    ];

    public function getGajiAttribute(){
        return "Rp ". number_format($this->attributes['gaji'],2,',','.');
    }

    public function getNamaPegawaiAttribute(){
        $id_user = $this->attributes['id_user'];
        $data = User::select('name')->where('id', $id_user)->first();
        return $data->name;
    }

    public function getDeadlineAttribute()
    {
        $date = new \DateTime($this->attributes['kgb_terakhir']);
        $date->add(new \DateInterval('P2Y'));
        return $date->format('Y-m-d');
    }

    public function getStatsAttribute()
    {
        $date_deadline = new \DateTime($this->attributes['kgb_terakhir']);
        $date_deadline->add(new \DateInterval('P2Y'));
        $date_deadline->format('Y-m-d');

        $date_now = Carbon::now();
        $date_now->format('Y-m-d');


        $diff = date_diff( $date_deadline, $date_now, 'DAY')->format("%r%a");
        if ($diff <= 60 || $date_now >= $date_deadline){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
