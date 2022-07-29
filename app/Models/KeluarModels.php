<?php 
namespace App\Models;

use CodeIgniter\Model;

class KeluarModels extends Model
{
   protected $table = 'material_keluar';
   protected $allowedFields = [
      'id', 'sn', 'mac','mitra', 'layanan', 'tanggal', 'sc', 'notel', 'nama_teknisi', 'type'
   ];

   public function getData() {
      return $this->findAll();
   }
   
   public function getSN($sn)
   {
       return $this->where(['sn' => $sn])->first();
   }
}