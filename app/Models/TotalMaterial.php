<?php 
namespace App\Models;

use CodeIgniter\Model;

class TotalMaterial extends Model
{
   protected $table = 'total_material';
   protected $allowedFields = [
      'sn', 'type', 'tanggal', 'mac','mitra', 'layanan', 'sc', 'notel', 'nama_teknisi', 'rusak', 'id'
   ];

   public function getData() {
      return $this->findAll();
   }

   public function getSN($sn)
   {
       return $this->where(['sn' => $sn])->first();
   }

}