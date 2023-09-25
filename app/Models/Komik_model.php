<?php

namespace App\Models;

use CodeIgniter\Model;

class Komik_model extends Model
{
  // cel table,cekprimary key, returnType, iinsertId = 0, DBgroup, usesoftdelete, allowrdfileds,use timestamp,date format, 
  protected $table = "tb_komik";
  protected $primaryKey = 'id_komik';
  protected $allowedFields = ['judul', 'slug', 'penerbit', 'penulis', 'gambar'];
  protected $useTimestamps = true;
  public function getKomik($slug = false)
  {
    if ($slug == false) {
      return $this->findAll();
    }
    return $this->where(['slug' => $slug])->first();
  }
}
