<?php

class Recipe_Mixer_Model extends CI_Model
{
	private $recipe_id, $mixer_id;

	protected $ci;

	public function __construct($recipe_id = 0, $mixer_id = 0)
	{
		$this->_set_recipe_id($recipe_id);
		$this->_set_mixer_id($mixer_id);
	}

	public function save()
	{
		$data = array(
			'recipe_id'		=> $this->get_recipe_id(),
			'mixer_id'		=> $this->get_mixer_id()
		);

		$this->db->where('recipe_id', $this->get_recipe_id());
		$this->db->where('mixer_id', $this->get_mixer_id());

		$this->db->update('recipes_mixers', $data);
		if ($this->db->affected_rows() == 0)
		{
			$this->db->insert('recipes_mixers', $data);
		}
	}

	public function delete()
	{
		$this->db->where('recipe_id', $this->get_recipe_id());
		$this->db->where('mixer_id', $this->get_mixer_id());

		$this->db->delete('recipe_mixer_model');
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

	public function get_mixer_id()
	{
		return $this->mixer_id;
	}
	
	protected function _set_mixer_id($mixer_id)
	{
		$this->mixer_id = $mixer_id;
	}
}

?>