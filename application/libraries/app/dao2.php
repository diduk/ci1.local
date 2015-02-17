<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dao2
 *
 * @author diduk
 */
class dao2 extends CI_Controller {

    //put your code here

    public function teszt() {
        $query = $this->db->get('tmp');

        foreach ($query->result() as $row) {
            print_r($row);
        }
        //var_dump($a);
        return get_class($this->db);
    }

    public function insert($table_obj) {
        $this->db->insert($table_obj::TABLE, $table_obj);
        $table_obj->{$table_obj::PK} = $this->db->insert_id();
        return $table_obj->{$table_obj::PK};
    }

    public function update($table_obj) {
        return $this->db->update($table_obj::TABLE, $table_obj, array($table_obj::PK => $table_obj->{$table_obj::PK}));
    }

    /*
      public function populate($class,$row){
      $ret=new $class;
      foreach ($row as $k=>$v){
      $ret->$k=$v;
      }
      return $ret;
      }
     * 
     */

    public function load($table_obj) {
        $query = $this->db->get_where($table_obj::TABLE, [
            $table_obj::PK => $table_obj->{$table_obj::PK}
        ]);

        foreach ($query->row() as $k => $v) {
            $table_obj->$k = $v;
        }
        return $table_obj;
    }

    public function delete($table_obj) {
        return $this->db->delete($table_obj::TABLE, [
            $table_obj::PK => $table_obj->{$table_obj::PK}
        ]);
        
    }

    public function save($table_obj) {
        if (
                (isset($table_obj->{$table_obj::PK})) and 
                ($table_obj->{$table_obj::PK})
            ){
            $this->update($table_obj);
        }
        else{
            $id=$this->insert($table_obj);
            $table_obj->{$table_obj::PK}=$id;
        }
        return $table_obj;
    }
    
    public function get($table_obj,$limit=false,$offset=false){
        if ($limit){
            
        }else{
            $query=$this->db->get($table_obj::TABLE);
        }
        
        $ret=array();
        $class=  get_class($table_obj);
        
        foreach ($query->result() as $row){
            $table_item = new $class;
            foreach ($row as $k=>$v){
                $table_item->$k=$v;
            }
            
            $ret[$table_item->{$table_item::PK}]=$table_item;
        }
        
        return $ret;
    }

}
