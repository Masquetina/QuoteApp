<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$ispost = $this->input->server('REQUEST_METHOD') == 'POST';
		$username = $this->input->post('username');
		if ($ispost) {
			$config['upload_path'] = './custom/img/avatars/';
      $config['allowed_types'] = 'jpg|jpeg';
			// MIN MAX WIDTH HEIGHT SIZE !!!
			$config['file_name'] = $username;
			$config['overwrite'] = TRUE;
	    $this->load->library('upload', $config);
			!$this->upload->do_upload('userfile');
			if(!$this->upload->do_upload()) {
				$warning = 'You can upload only JPG or JPEG!';
				$this->session->set_flashdata('warning', $warning);
				redirect('profile/'. $username);
			} else {
				$config['image_library']	= 'gd2';
        $config['source_image']		= './custom/img/avatars/' . $username . '.jpg';
				$config['new_image']			= './custom/img/avatars/' . $username . '.jpg';
				$config['maintain_ratio']	= TRUE;
        $config['width']					= 320;
        $config['height']					= 320;
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				redirect('profile/'. $username);
			}
		}
	}
}
