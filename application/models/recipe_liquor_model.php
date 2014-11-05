<?php

class Recipe_Liquor_Model extends CI_Model
{
	private $recipe_id, $liquor_id;

	protected $ci;

	public function __construct($recipe_id = 0, $liquor_id = 0)
	{
		$this->_set_recipe_id($recipe_id);
		$this->_set_liquor_id($liquor_id);
	}

	public function save()
	{
		$data = array(
			'recipe_id'		=> $this->get_recipe_id(),
			'liquor_id'		=> $this->get_liquor_id()
		);

		$this->db->where('recipe_id', $this->get_recipe_id());
		$this->db->where('liquor_id', $this->get_liquor_id());

		$this->db->update('recipes_liquors', $data);
		if ($this->db->affected_rows() == 0)
		{
			$this->db->insert('recipes_liquors', $data);
		}
	}

	public function delete()
	{
		$this->db->where('recipe_id', $this->get_recipe_id());
		$this->db->where('liquor_id', $this->get_liquor_id());

		$this->db->delete('recipe_liquor_model');
	}

	//----------------------
	// Get and Set Methods
	//----------------------

	public function get_recipe_id()
	{
		return $this->recipe_id;
	}
	
	protected function _set_recipe_id($recipe_id)
	{
		$this->recipe_id = $recipe_id;
	}

	public function get_liquor_id()
	{
		return $this->liquor_id;
	}
	
	protected function _set_liquor_id($liquor_id)
	{
		$this->liquor_id = $liquor_id;
	}
}

?>