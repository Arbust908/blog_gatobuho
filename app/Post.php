<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function nameState(){
        if($this->state === 0){
            var_dump($this->state);
            return "Inactivo " . $this->state;
        } elseif($this->state === 1){
            var_dump($this->state);
            return "Activo " . $this->state;
        } elseif ($this->state === 9) {
            var_dump($this->state);
            return "Destruido " . $this->state;
        }
        var_dump($this->state);
        return "Desconocido " . $this->state;
    }
}
