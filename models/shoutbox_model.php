<?php

class Shoutbox_model extends CI_Model {
   
   function __construct() {
      
      $this->load->helper('text');
      $this->load->helper('smiley');
      
      parent::__construct();
   }
   
   function get($from=0, $limit=11, $group="shoutbox") {
      
      $to = $from+$limit;
      
      $this->db->select('*')->from('module_shoutbox AS sb');
      $this->db->join('user AS usr', 'sb.id_author = usr.id_user', 'LEFT');
      $this->db->where('sb.group', $group);
      $this->db->order_by('sb.time', 'DESC')->limit($to,$from);
      $query = $this->db->get();
      
      return $query->result();
      
   }
   
   function get_all($group="shoutbox") {
      
      $this->db->select('*')->from('module_shoutbox AS sb');
      $this->db->join('user AS usr', 'sb.id_author = usr.id_user', 'LEFT');
      $this->db->where('group', $group);
      $this->db->order_by('sb.time', 'DESC');
      
      return $this->db->get();
   }
   
   function post($user_id, $message, $group="shoutbox") {
      
      $this->db->insert('module_shoutbox', array(
          'id_author' => $user_id,
          'time' => time(),
          'message' => $message,
          'group' => $group
      ));
      
      echo "true";
      
   }
   
   public function lattest_post($group="shoutbox") {
      
      $this->db->select('*')->from('module_shoutbox AS sb');
      $this->db->join('user AS usr', 'sb.id_author = usr.id_user', 'LEFT');
      $this->db->where('sb.group', $group);
      $this->db->order_by('sb.time', 'DESC');
      $query = $this->db->get();
      
      if($query->num_rows() > 0)      
      	return $query->row();
      
      return false;
   }
   
}
