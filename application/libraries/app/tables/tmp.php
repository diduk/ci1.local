<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tmp
 *
 * @author diduk
 */
class tmp {

    const TABLE = 'tmp';
    const PK = 'id';


    public $id;
    public $data;


    public function teszt(){
        return $this->{$this::PK};
    }
    
    //put your code here
}
