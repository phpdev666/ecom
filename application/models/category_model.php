<?php
class category_model extends CI_Model 
{
	/*Insert*/
	/*Insert*/
	public function saverecords($data)
	{
          $this->db->insert('categoty_table',$data);
          return $this->db->insert_id();
	}

	public function displayrecords()
	{
        $query=$this->db->query("select * from categoty_table");
		return $query->row();
	}

	public function getDataByid($category_id)
	{
        $query=$this->db->query("select * from categoty_table Where category_id='".$category_id."'");
		return $query->row();
	}

	public function update_records($data,$category_id)
	{
		$this->db->where('category_id',$category_id);
		$this->db->update('categoty_table',$data);
		return;
	}

	public function update_displayrecords()
	{
		$sql = $this->db->get('categoty_table');
        return $sql->result();
	}

	function deleterecords($category_id)
	{
		$this->db->query("delete from categoty_table where category_id='".$category_id."'");
	}
}