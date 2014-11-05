<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submit extends CI_Controller {

	private $data;

	public function index()
	{
		$this->data['page'] = 'submit';
		// $this->data['glassware'] = Glassware_Model::get_all();
		$this->load->view('header', $this->data);
		$this->load->view('submit', $this->data);
		$this->load->view('footer', $this->data);
	}
}

/* End of file submit.php */
/* Location: ./application/controllers/submit.php */