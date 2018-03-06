<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
     protected $table = 'mahasiswas';
     protected $fillable = ['nama','nim','dosen_id'];
     public $timestamps = true;

	public function Dosen()
	{
		return $this->belongsTo('App\Dosen','dosen_id');
	}

    public function Wali()
    {
    	return $this->hasOne('App\Wali','mahasiswa_id');
    }
}
