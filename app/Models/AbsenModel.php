<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AbsenModel extends Model
{
    use HasFactory;
    protected $table = "absen";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','nama','perusahaan','ruang','kegiatan','tanggung_jawab','tgl','jammasuk','jamkeluar'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function detailData($id)
    {
        return DB::table('absen')->where('id', $id)->first();
    }
}
