<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Model
{
	
	protected $table       = 'site_settings';
	protected $data        = array();
	protected $primary_id 	= 'id';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function all($select=null)
	{
		if($select && is_array($select))
			$this->db->select($select);
		
		return $this->db->get($this->table)->result_array();

	}

	
	public function save($data)
	{
		
		$this->data = $data;

		if(array_key_exists($this->primary_id,$this->data)){
			return $this->db->where($this->primary_id,$this->data[$this->primary_id])->update($this->table,$this->data);
		}
		else
			return $this->db->insert($this->table,$this->data);
		
	}

	public function updateByKey($data)
	{
		return $this->db->where('key',$data['key'])->update($this->table,$data);
	}
		
	
	public function getById($id)
	{
		return $this->db->where('id',$id)->get($this->table)->row_array();
	}

	public function checkByKey($key)
	{
		return $this->db->where('key',$key)->get($this->table)->num_rows();
	}

	public function delete($id)
	{
		return $this->db->where($this->primary_id,$id)->delete($this->table);
	}

}