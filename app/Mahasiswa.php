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

    /*
     * Relasi Many-to-Many
     * ===================
     * Buat function bernama hobi(), dimana model 'Mahasiswa' memiliki relasi
     * Many-to-Many (belongsToMany) terhadap model 'Hobi' yang terhubung oleh
     * tabel 'mahasiswa_hobi' masing-masing sebagai 'mahasiswa_id' dan 'hobi_id' 
     */
    public function hobi() 
    {
        return $this->belongsToMany('App\Hobi', 'mahasiswa_hobi', 'mahasiswa_id', 'hobi_id');
    }
}
