<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Module admin controller
*
*
*/
class Ajax_shoutbox extends Module_Admin {
	/**
	* Constructor
	*
	* @access	public
	* @return	void
	*/
	public function construct() {
      
      $this->load->model('shoutbox_model');
      
   }

	/**
	* Admin panel
	* Called from the modules list.
	*
	* @access	public
	* @return	parsed view
	*/
	public function index() {
		
         $config = array();    
        include MODPATH."Ajax_shoutbox/config/config.php";
        
        $this->template['config'] = $config['module']['ajax_shoutbox'];
        
        $this->template['posts_query'] = $this->shoutbox_model->get_all();
        $this->template['posts'] = $this->shoutbox_model->get_all()->result();
        $this->template['posts_num'] = $this->shoutbox_model->get_all()->num_rows();
        
        $this->template['codes_query'] = $this->shoutbox_model->get_all_codes();
        $this->template['codes'] = $this->shoutbox_model->get_all_codes()->result();
        $this->template['codes_num'] = $this->shoutbox_model->get_all_codes()->num_rows();
    
        $this->output('admin/overview');
      
	}
}

