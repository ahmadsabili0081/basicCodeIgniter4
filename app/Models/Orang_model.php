<?php

namespace App\Models;

use CodeIgniter\Model;

class Orang_model extends Model
{
  protected $table = 'tb_orang';
  protected $id = 'id_orang';
  protected $useTimestamps = true;
  protected $allowedFields = ['nama_orang', 'alamat'];
  public function search($data = '')
  {
    return $this->table('tb_orang')->like('nama_orang', $data)->orLike('alamat', $data);
  }
}
