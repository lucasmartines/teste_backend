<?php
namespace App\Models;

use CodeIgniter\Model;


class User extends Model{

    protected $table = "user";
    protected $allowedFields = ['nome', 'sobre_nome', 'nascimento','email'];



    public function getUser( $id )
    {   
        
        if($id)
        {
            return $this->asArray()->where(['id' => $id])->first();
        }
    }

    public function getUsers( $id = false )
    {

        if ($id === false)
        {
            return $this->asArray()->paginate(5);
        }
        else
        {
            return $this->asArray()
                        ->where(['id' => $id])
                        ->first();
        }

    }
}