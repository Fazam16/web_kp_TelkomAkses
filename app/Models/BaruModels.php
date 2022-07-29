<?php 
namespace App\Models;

use CodeIgniter\Model;

class BaruModels extends Model
{
   protected $table = 'material_baru';
   protected $allowedFields = [
      'id', 'sn', 'type'
   ];

}