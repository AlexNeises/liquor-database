<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_Model extends CI_Model
{
	private $name, $city, $country, $founded;

	protected $ci;

	public function __construct($name = null, $data = null)
	{
		$this->_set_name($name);
		$this->_get($data);
	}

	protected function _get($data = null)
	{
		if($this->get_name() != null && $data == null)
		{
			$query = $this->db->get_where('Company', array('name' => $this->get_name()));

			if($query->num_rows == 1)
			{
				$data = $query->row();
			}
		}

		if($data != null)
		{
			$this->set_city($data->city);
			$this->set_country($data->country);
			$this->set_founded($data->founded);

			return true;
		}

		return false;
	}

	public function save()
	{
		$data = array(
			'city'		=>	$this->get_city(),
			'country'	=>	$this->get_country(),
			'founded'	=>	$this->get_founded()
		);

		if($this->get_name() == null)
		{
			if(!$this->db->insert('Company', $data))
			{
				return false;
			}
			$this->_set_name($data->name);
		}
		else
		{
			$this->db->where('name', $this->get_name());
			if(!$this->db->update('Company', $data))
			{
				return false;
			}
		}
	}

	public function delete()
	{
		if($this->get_name() != null)
		{
			$this->db->where('name', $this->get_name());
			$this->db->delete('Company');
		}
	}

	//----------------------
	// Static Methods
	//----------------------

	static public function get_all()
	{
		$ci =& get_instance();

		$select = sprintf("SELECT * FROM `Company` WHERE 1 ORDER BY `name` ASC");

		$all = array();

		if(!$query = $ci->db->query($select))
		{
			log_message('debug', $ci->db->_error_message());
			return false;
		}

		if($query->num_rows > 0)
		{
			foreach($query->result() as $row)
			{
				$all[] = new Company_Model($row->name, $row);
			}
		}

		return $all;
	}

	//----------------------
	// Get and Set Methods
	//----------------------

	public function get_name()
	{
		return $this->name;
	}
	
	protected function _set_name($name)
	{
		$this->name = $name;
	}

	public function get_city()
	{
		return $this->city;
	}
	
	public function set_city($city)
	{
		$this->city = $city;
	}

	public function get_country()
	{
		return $this->country;
	}
	
	public function set_country($country)
	{
		$this->country = $country;
	}

	public function get_founded()
	{
		return $this->founded;
	}
	
	public function set_founded($founded)
	{
		$this->founded = $founded;
	}
}

/* End of file Company_Model.php */
/* Location: ./application/models/Company_Model.php */