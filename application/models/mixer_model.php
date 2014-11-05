<?php

class Mixer_Model extends CI_Model
{
	private $mixer_id, $name, $amount;

	protected $ci;

	public function __construct($mixer_id = 0, $data = null)
	{
		$this->_set_mixer_id($mixer_id);
		$this->_get($data);
	}

	protected function _get($data = null)
	{
		if($this->get_mixer_id() != 0 && $data == null)
		{
			$query = $this->db->get_where('mixers', array('mixer_id' => $this->get_mixer_id()));

			if($query->num_rows == 1)
			{
				$data = $query->row();
			}
		}

		if($data != null)
		{
			$this->set_name($data->name);
			$this->set_amount($data->amount);

			return true;
		}

		return false;
	}

	public function save()
	{
		$data = array(
			'name'		=>	$this->get_name(),
			'amount'	=>	$this->get_amount()
		);

		if($this->get_mixer_id() === 0)
		{
			if(!$this->db->insert('mixers', $data))
			{
				return false;
			}
			$this->_set_mixer_id($this->db->insert_id());
		}
		else
		{
			$this->db->where('mixer_id', $this->get_mixer_id());
			if(!$this->db->update('mixers', $data))
			{
				return false;
			}
		}
	}

	public function delete()
	{
		if($this->get_mixer_id() != 0)
		{
			$this->db->where('mixer_id', $this->get_mixer_id());
			$this->db->delete('mixers');
		}
	}

	//----------------------
	// Get and Set Methods
	//----------------------

	public function get_mixer_id()
	{
		return intval($this->mixer_id);
	}
	
	protected function _set_mixer_id($mixer_id)
	{
		$this->mixer_id = intval($mixer_id);
	}

	public function get_name()
	{
		return $this->name;
	}
	
	public function set_name($name)
	{
		$this->name = $name;
	}

	public function get_amount()
	{
		return $this->amount;
	}
	
	public function set_amount($amount)
	{
		$this->amount = $amount;
	}

}

?>