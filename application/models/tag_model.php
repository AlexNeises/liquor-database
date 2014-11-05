<?php

class Tag_Model extends CI_Model
{
	private $tag_id, $tag;

	protected $ci;

	public function __construct($tag_id = 0, $data = null)
	{
		$this->_set_tag_id($tag_id);
		$this->_get($data);
	}

	protected function _get($data = null)
	{
		if($this->get_tag_id() != 0 && $data == null)
		{
			$query = $this->db->get_where('tags', array('tag_id' => $this->get_tag_id()));

			if($query->num_rows == 1)
			{
				$data = $query->row();
			}
		}

		if($data != null)
		{
			$this->set_tag($data->tag);

			return true;
		}

		return false;
	}

	public function save()
	{
		$data = array(
			'tag'	=>	$this->get_tag()
		);

		if($this->get_tag_id() === 0)
		{
			if(!$this->db->insert('tags', $data))
			{
				return false;
			}
			$this->_set_tag_id($this->db->insert_id());
		}
		else
		{
			$this->db->where('tag_id', $this->get_tag_id());
			if(!$this->db->update('tags', $data))
			{
				return false;
			}
		}
	}

	public function delete()
	{
		if($this->get_tag_id() != 0)
		{
			$this->db->where('tag_id', $this->get_tag_id());
			$this->db->delete('tags');
		}
	}

	//----------------------
	// Get and Set Methods
	//----------------------

	public function get_tag_id()
	{
		return intval($this->tag_id);
	}
	
	protected function _set_tag_id($tag_id)
	{
		$this->tag_id = intval($tag_id);
	}

	public function get_tag()
	{
		return $this->tag;
	}
	
	public function set_tag($tag)
	{
		$this->tag = $tag;
	}

}

?>