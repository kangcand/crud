<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosens'; // -> meminta izin untuk mengakses table dosens
    protected $fillable = ['nama','nipd']; // -> field apa saja yang boleh di isi -> fill = mengisi, able = boleh jadi fillable = boleh di isi
    public $timestamps = true; // penanggalan otomatis record kapan di isi dan di update di aktikfkan

    public function Mahasiswa()
    {
    	return $this->hasMany('App\Mahasiswa','dosen_id');
    }
}
