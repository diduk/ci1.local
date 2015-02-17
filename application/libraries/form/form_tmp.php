<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of form_tmp
 *
 * @author diduk
 */
class form_tmp extends CI_Controller {

    //put your code here
    public $id = 0;
    public $data = '';
   

    public function __construct() {
        parent::__construct();

        $this->init();
    }

    function init() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules([
            [
                'field'=>'data',
                'label'=>'Adat:',
                'rules'=>'required'
            ],
            
            
            
        ]);
        
        
        //$this->validation=new form_validation();
        
        
    }
    
    public function isValid(){
        return $this->form_validation->run();
    }
    
    public function check(){
       //var_dump($this->form_validation);
    }
    
    function getData(){
        $this->id=$this->input->post('id');
        $this->data=$this->input->post('data');
        return ['data'=>$this->data,'id'=>$this->id];
    }
   

    function __toString() {
        $ret = form_open();
        $ret.= form_hidden('id', $this->id);
        $ret.= form_input('data', $this->data);
        $ret.= form_submit('submit','küldés');
        $ret.=form_close();

        return $ret;
    }

}
