<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
                $this->load->library('app/dao2');
                $app=new dao2();
                echo (get_class($app));
                
                $this->load->library('app/tables/tmp');
                $i=new tmp();
                
                $i->id=1;
                $i->data='first data modified';
                $app->update($i);
                
                //echo 'az id elvileg:'.$i->teszt().'<br>';
                
                
                
                echo $app->teszt();
                $this->load->library('form/form_tmp');
                $form_tmp=new form_tmp();

                
                if ($form_tmp->isValid()){
                    $data=$form_tmp->getData();
                    $str='';
                    foreach ($data as $k=>$v){
                        $str.="<p>$k:$v</p>";
                    }
                    $form_tmp=$str;
                } else {
//                    echo 'nem valid';
                }
                //echo $form_tmp;
                
 
		$this->load->view('welcome_message',array('my_form'=>$form_tmp));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */