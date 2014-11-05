<?php

class Recipe_Glassware_Model extends CI_Model
{
	private $recipe_id, $glassware_id;

	protected $ci;

	public function __construct($recipe_id = 0, $glassware_id = 0)
	{
		$this->_set_recipe_id($recipe_id);
		$this->_set_glassware_id($glassware_id);
	}

	public function save()
	{
		$data = array(
			'recipe_id'		=> $this->get_recipe_id(),
			'glassware_id'	=> $this->get_glassware_id()
		);

		$this->db->where('recipe_id', $this->get_recipe_id());
		$this->db->where('glassware_id', $this->get_glassware_id());

		$this->db->update('recipes_glassware', $data);
		if ($this->db->affected_rows() == 0)
		{
			$this->db->insert('recipes_glassware', $data);
		}
	}

	public function delete()
	{
		$this->db->where('recipe_id', $this->get_recipe_id());
		$this->db->where('glassware_id', $this->get_glassware_id());

		$this->db->delete('recipe_glassware_model');
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

	public function get_glassware_id()
	{
		return $this->glassware_id;
	}
	
	protected function _set_glassware_id($glassware_id)
	{
		$this->glassware_id = $glassware_id;
	}
}

?>