<?php

class Glassware_Model extends CI_Model
{
	private $glassware_id, $glass, $capacity;

	protected $ci;

	public function __construct($glassware_id = 0, $data = null)
	{
		$this->_set_glassware_id($glassware_id);
		$this->_get($data);
	}

	protected function _get($data = null)
	{
		if($this->get_glassware_id() != 0 && $data == null)
		{
			$query = $this->db->get_where('glassware', array('glassware_id' => $this->get_glassware_id()));

			if($query->num_rows == 1)
			{
				$data = $query->row();
			}
		}

		if($data != null)
		{
			$this->set_glass($data->glass);
			$this->set_capacity($data->capacity);

			return true;
		}

		return false;
	}

	public function save()
	{
		$data = array(
			'glass'		=>	$this->get_glass(),
			'capacity'	=>	$this->get_capacity()
		);

		if($this->get_glassware_id() === 0)
		{
			if(!$this->db->insert('glassware', $data))
			{
				return false;
			}
			$this->_set_glassware_id($this->db->insert_id());
		}
		else
		{
			$this->db->where('glassware_id', $this->get_glassware_id());
			if(!$this->db->update('glassware', $data))
			{
				return false;
			}
		}
	}

	public function delete()
	{
		if($this->get_glassware_id() != 0)
		{
			$this->db->where('glassware_id', $this->get_glassware_id());
			$this->db->delete('glassware');
		}
	}

	//----------------------
	// Static Methods
	//----------------------

	static public function get_all()
	{
		$ci =& get_instance();

		$select = sprintf("SELECT * FROM `glassware` WHERE 1 ORDER BY `glass` ASC");

		$all_glasses = array();

		if(!$query = $ci->db->query($select))
		{
			log_message('debug', $ci->db->_error_message());
			return false;
		}

		if($query->num_rows > 0)
		{
			foreach($query->result() as $row)
			{
				$all_glasses[] = new Glassware_Model($row->glassware_id, $row);
			}
		}

		return $all_glasses;
	}

	//----------------------
	// Get and Set Methods
	//----------------------

	public function get_glassware_id()
	{
		return intval($this->glassware_id);
	}
	
	protected function _set_glassware_id($glassware_id)
	{
		$this->glassware_id = intval($glassware_id);
	}

	public function get_glass()
	{
		return $this->glass;
	}
	
	public function set_glass($glass)
	{
		$this->glass = $glass;
	}

	public function get_capacity()
	{
		return $this->capacity;
	}
	
	public function set_capacity($capacity)
	{
		$this->capacity = $capacity;
	}

}

?>