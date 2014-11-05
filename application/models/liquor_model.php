<?php

class Liquor_Model extends CI_Model
{
	private $liquor_id, $name, $proof, $amount;

	protected $ci;

	public function __construct($liquor_id = 0, $data = null)
	{
		$this->_set_liquor_id($liquor_id);
		$this->_get($data);
	}

	protected function _get($data = null)
	{
		if($this->get_liquor_id() != 0 && $data == null)
		{
			$query = $this->db->get_where('liquors', array('liquor_id' => $this->get_liquor_id()));

			if($query->num_rows == 1)
			{
				$data = $query->row();
			}
		}

		if($data != null)
		{
			$this->set_name($data->name);
			$this->set_proof($data->proof);
			$this->set_amount($data->amount);

			return true;
		}

		return false;
	}

	public function save()
	{
		$data = array(
			'name'		=>	$this->get_name(),
			'proof'		=>	$this->get_proof(),
			'amount'	=>	$this->get_amount()
		);

		if($this->get_liquor_id() === 0)
		{
			if(!$this->db->insert('liquors', $data))
			{
				return false;
			}
			$this->_set_liquor_id($this->db->insert_id());
		}
		else
		{
			$this->db->where('liquor_id', $this->get_liquor_id());
			if(!$this->db->update('liquors', $data))
			{
				return false;
			}
		}
	}

	public function delete()
	{
		if($this->get_liquor_id() != 0)
		{
			$this->db->where('liquor_id', $this->get_liquor_id());
			$this->db->delete('liquors');
		}
	}

	//----------------------
	// Get and Set Methods
	//----------------------

	public function get_liquor_id()
	{
		return intval($this->liquor_id);
	}
	
	protected function _set_liquor_id($liquor_id)
	{
		$this->liquor_id = intval($liquor_id);
	}

	public function get_name()
	{
		return $this->name;
	}
	
	public function set_name($name)
	{
		$this->name = $name;
	}

	public function get_proof()
	{
		return $this->proof;
	}
	
	public function set_proof($proof)
	{
		$this->proof = $proof;
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