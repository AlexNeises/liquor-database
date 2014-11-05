<?php

class Recipe_Tag_Model extends CI_Model
{
	private $recipe_id, $tag_id;

	protected $ci;

	public function __construct($recipe_id = 0, $tag_id = 0)
	{
		$this->_set_recipe_id($recipe_id);
		$this->_set_tag_id($tag_id);
	}

	public function save()
	{
		$data = array(
			'recipe_id'	=> $this->get_recipe_id(),
			'tag_id'	=> $this->get_tag_id()
		);

		$this->db->where('recipe_id', $this->get_recipe_id());
		$this->db->where('tag_id', $this->get_tag_id());

		$this->db->update('recipes_tags', $data);
		if ($this->db->affected_rows() == 0)
		{
			$this->db->insert('recipes_tags', $data);
		}
	}

	public function delete()
	{
		$this->db->where('recipe_id', $this->get_recipe_id());
		$this->db->where('tag_id', $this->get_tag_id());

		$this->db->delete('recipe_tag_model');
	}

	//----------------------
	// Static Methods
	//----------------------

	static public function get_recipes_from_tag_name($tag_name)
	{
		$ci =& get_instance();

		$select = sprintf("SELECT DISTINCT * FROM `Tags`, `Recipes_Tags`, `Recipes` WHERE `Tags`.`tag` LIKE '%%%s%%' AND `Tags`.`tag_id` = `Recipes_Tags`.`tag_id` AND `Recipes_Tags`.`recipe_id` = `Recipes`.`recipe_id` GROUP BY `Recipes`.`recipe_id`", $tag_name);

		$recipes = array();

		if(!$query = $ci->db->query($select))
		{
			log_message('debug', $ci->db->_error_message());
			return false;
		}

		if($query->num_rows > 0)
		{
			foreach($query->result() as $row)
			{
				$recipe_ids[] = $row->recipe_id;
			}
		}
		else
		{
			return false;
		}

		return $recipe_ids;
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

	public function get_tag_id()
	{
		return $this->tag_id;
	}
	
	protected function _set_tag_id($tag_id)
	{
		$this->tag_id = $tag_id;
	}
}

?>