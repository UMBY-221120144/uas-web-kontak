<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakModel extends Model
{
  protected $table            = 'kontak';
  protected $primaryKey       = 'id';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = false;
  protected $allowedFields    = ['name', 'email', 'phone', 'address'];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}
