<?php
class Genre {
    private $data = [];
    
    public function __construct(){
        $this->data = [
            ['id'=>1, 'name'=>'Metal Hero'],
            ['id'=>2, 'name'=>'Kamen Rider'],
            ['id'=>3, 'name'=>'Polícia Especial'],
            ['id'=>4, 'name'=>'Resgate'],
        ];
    }
    
    public function all() {
        return $this->data;
    }
}