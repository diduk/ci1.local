<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author diduk
 */
class admin extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('html');
    }
    
    public function index(){
        
        
        $this->load->library('/app/dao2');
        $dao = new dao2();
        
        $this->load->library('/app/tables/tmp.php');
        $table_tmp= new tmp();
        
        $this->load->library('form/form_tmp');
        $add_data_form=new form_tmp();
        $add_data_form->id=3;
        
        if ($add_data_form->isValid()){
            $data=$add_data_form->getData();
            $row = new tmp();
            foreach ($data as $k=>$v){
                $row->$k=$v;
            }
            print_r($row);
            $dao->save($row);
                    
            $view_array['tmp_form_success']=['tmp_form_data'=>$data];
        }else{
            $view_array['tmp_form']=['tmp_form'=>$add_data_form];
        }
        
        $line_array=$dao->get($table_tmp);
        $view_array['list_data']=['list_data'=>$line_array];
        
        $this->render($view_array);
    }
    
    public function render($view_array){
        //print_r($view_array);
        
        $this->load->view('header');
        
        foreach ($view_array as $k=>$v){
            $this->load->view($k,$v);
        }
        
        
        $this->load->view('footer');
        
        
        
    }
}
