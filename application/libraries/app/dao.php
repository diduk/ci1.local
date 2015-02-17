<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dao
 *
 * @author diduk
 */
class dao extends CI_DB_mysql_driver {

    private $db;
    private $ci;

    //put your code here
    /*
      $config['hostname'] = "localhost";
      $config['username'] = "myusername";
      $config['password'] = "mypassword";
      $config['database'] = "mydatabase";
      $config['dbdriver'] = "mysql";
      $config['dbprefix'] = "";
      $config['pconnect'] = FALSE;
      $config['db_debug'] = TRUE;
      $config['cache_on'] = FALSE;
      $config['cachedir'] = "";
      $config['char_set'] = "utf8";
      $config['dbcollat'] = "utf8_general_ci";
     * 
     */
    public function __construct($db = false) {
        $this->ci = & get_instance();
        // echo get_class($this->ci);exit;
        $this->ci->load->database(array(
            'hostname' => "localhost",
            'username' => "root",
            'password' => "",
            'database' => "ci1",
            'dbdriver' => "mysql",
            'pconnect' => FALSE,
            'db_debug' => TRUE,
            'cache_on' => FALSE,
            'cachedir' => "",
            'char_set' => "utf8",
            'dbcollat' => "utf8_general_ci"
        ));

        $this->db = $this->ci->db;

        if ($db) {
            // $this->db=$db;
        }
    }

    public function teszt() {
        $query = $this->db->get('tmp');

        foreach ($query->result() as $row) {
            echo $row->data;
        }
        //var_dump($a);
        return get_class($this->db);
    }

}
