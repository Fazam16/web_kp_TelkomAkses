<?php 
namespace App\Models;

use CodeIgniter\Model;

class AkunModels extends Model
{
   protected $table = 'akun';
   protected $allowedFields = [
      'id', 'uname', 'password'
   ];

   public function getUname($uname)
   {
       return $this->where(['uname' => $uname])->first();
   }
}