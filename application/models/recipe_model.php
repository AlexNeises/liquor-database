<?php

class Recipe_Model extends CI_Model
{
	private $recipe_id, $name, $instructions, $description;

	protected $ci;

	public function __construct($recipe_id = 0, $data = null)
	{
		$this->_set_recipe_id($recipe_id);
		$this->_get($data);
	}

	protected function _get($data = null)
	{
		if($this->get_recipe_id() != 0 && $data == null)
		{
			$query = $this->db->get_where('recipes', array('recipe_id' => $this->get_recipe_id()));

			if($query->num_rows == 1)
			{
				$data = $query->row();
			}
		}

		if($data != null)
		{
			$this->set_name($data->name);
			$this->set_instructions($data->instructions);
			$this->set_description($data->description);

			return true;
		}

		return false;
	}

	public function save()
	{
		$data = array(
			'name'			=>	$this->get_name(),
			'instructions'	=>	$this->get_instructions(),
			'description'	=>	$this->get_description()
		);

		if($this->get_recipe_id() === 0)
		{
			if(!$this->db->insert('recipes', $data))
			{
				return false;
			}
			$this->_set_recipe_id($this->db->insert_id());
		}
		else
		{
			$this->db->where('recipe_id', $this->get_recipe_id());
			if(!$this->db->update('recipes', $data))
			{
				return false;
			}
		}
	}

	public function delete()
	{
		if($this->get_recipe_id() != 0)
		{
			$this->db->where('recipe_id', $this->get_recipe_id());
			$this->db->delete('recipes');
		}
	}

	//----------------------
	// Static Methods
	//----------------------

	static public function get_all()
	{
		$ci =& get_instance();

		$select = sprintf("SELECT * FROM `recipes` WHERE 1");

		$all_recipes = array();

		if(!$query = $ci->db->query($select))
		{
			log_message('debug', $ci->db->_error_message());
			return false;
		}

		if($query->num_rows > 0)
		{
			foreach($query->result() as $row)
			{
				$all_recipes[] = new Recipe_Model($row->recipe_id, $row);
			}
		}

		return $all_recipes;
	}

	//----------------------
	// Get and Set Methods
	//----------------------

	public function get_recipe_id()
	{
		return intval($this->recipe_id);
	}
	
	protected function _set_recipe_id($recipe_id)
	{
		$this->recipe_id = intval($recipe_id);
	}

	public function get_name()
	{
		return $this->name;
	}
	
	public function set_name($name)
	{
		$this->name = $name;
	}

	public function get_instructions()
	{
		return $this->instructions;
	}
	
	public function set_instructions($instructions)
	{
		$this->instructions = $instructions;
	}

	public function get_description()
	{
		return $this->description;
	}
	
	public function set_description($description)
	{
		$this->description = $description;
	}

}

?>