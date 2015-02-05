<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_shoutbox extends My_Controller
{
	/* ------------------------------------------------------------------------------------------------------------- */
	
	public function __construct()
	{
		parent::__construct();
	}
	
	/* ------------------------------------------------------------------------------------------------------------- */

	function index()
	{		
        $from = $this->input->post('from');
        $limit = $this->input->post('limit');
      
        if(!$from) $from = 0;
        if(!$limit) $limit = 11;
      
        $user_id = $this->input->post('user_id');
        $message = $this->input->post('message');
        $group = $this->input->post('group');
      
        if(!$group) $group = "shoutbox";
      
        $character_limit = $this->input->post('character_limit');
      
        if(isset($_POST['ajax']))
        {
            $this->load->model('shoutbox_model');
         
            switch($_POST['ajax'])
            {            
                case "post":          
               
                    if($user_id != false && $message != false)
                        $this->shoutbox_model->post($user_id, $message, $group);
               
                    break;
            
                case "get":
               
                    $this->template['from'] = $from;
                    $this->template['limit'] = $limit;
               
                    $this->template['items'] = $this->shoutbox_model->get($from, $limit, $group);
               
                    $this->output('get');
            
                    break;
            
                case "status":
            
                    $lattest = $this->shoutbox_model->lattest_post($group);
               
                    if($lattest != false) echo $lattest->time;               	
               		    else echo time();
               
                    break;
            }         
        }      
	}
	
    /* ------------------------------------------------------------------------------------------------------------- */
}

/* End of file: ajax_shoutbox.php */
/* Location: ./modules/Ajax_shoutbox/controllers/ajax_shoutbox.php */
