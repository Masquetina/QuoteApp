<?php

class User extends CI_Model {

  public function validate() {
    $this->db->where('email', $this->input->post('email'));
    $this->db->where('password', $this->input->post('password'));
    $query = $this->db->get('users');

    if($query->num_rows() == 1) {
      return true;
    } else {
      if($query->num_rows() == 0){
        // $message[] = ...
      } else {
        // $message[] = ...
      }
    }
  }
}
