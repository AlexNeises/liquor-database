<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	private $data;

	public function index()
	{
		$this->data['page'] = 'search';
		// $this->data['recipes'] = Recipe_Model::get_all();
		$this->load->view('header', $this->data);
		$this->load->view('home', $this->data);
		$this->load->view('footer', $this->data);
	}

	function recipe()
	{
		$this->data['page'] = 'search';
		if($post_data = $this->input->post())
		{
			// $this->data['found_recipe_ids'] = Recipe_Tag_Model::get_recipes_from_tag_name($post_data['search_string']);
			$this->load->view('header', $this->data);
			$this->load->view('search', $this->data);
			$this->load->view('footer', $this->data);
		}
	}
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */