<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    protected $table = 'walis';
    protected $fillable = ['nama','mahasiswa_id'];
    public $timestamps = true;

    public function Mahasiswa()
	{
		return $this->belongsTo('App\Mahasiswa','mahasiswa_id');
	}
}
