<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
  protected $primaryKey = 'id_surat';
  protected $table = 'surat';
  protected $fillable = [
      'penerima', 'pengirim', 'perihal', 'isi', 'foto', 'status_surat'
  ];
  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }
}
