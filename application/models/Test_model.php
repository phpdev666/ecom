<?php
class Test_model extends CI_Model
{
	public function saverecords($data)
	{
		$this->db->insert('test_table', $data);
		return $this->db->insert_id();
	}

	public function displayrecords()
	{
        $query=$this->db->query("select * from test_table");
		return $query->row();
	}

	public function getDataByid($id)
	{
        $query=$this->db->query("select * from test_table Where id='".$id."'");
		return $query->row();
	}

	public function update_records($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('test_table',$data);
		return;
	}

	public function update_displayrecords()
	{
		$sql = $this->db->get('test_table');
        return $sql->result();
	}

	function deleterecords($id)
	{
		$this->db->query("delete  from test_table where id='".$id."'");
	}
}
?>