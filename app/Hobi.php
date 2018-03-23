<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
	/*
	 * Relasi Many-to-Many
	 * ===================
	 * Buat function bernama mahasiswa(), dimana model 'Hobi' memiliki relasi
	 * Many-to-Many (belongsToMany) terhadap model 'Mahasiswa' yang terhubung oleh
	 * tabel 'mahasiswa_hobi' masing-masing sebagai 'hobi_id' dan 'mahasiswa_id' 
	 */
	
    public function mahasiswa() 
    {
		return $this->belongsToMany('App\Mahasiswa', 'mahasiswa_hobi', 'hobi_id', 'mahasiswa_id');
	}
}
