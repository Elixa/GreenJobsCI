<?php 
class MY_Model extends CI_Model {
	
	private $_tableName;
	
	function __construct($tablename) {
		parent::__construct();
	}
	
	function setTable($table) {
		$this->_tableName = $table
	}
	
	function _insert($data) {
		$this->db->insert($this->_table, $data)
	}
	
	function _delete($id) {
		$this->db->delete($this->_tableName,$id);
	}
	
	function _update($data,$id) {
		$this->db->where("id_".$this->_tableName,$id)->update($this->_tableName, $data);
	}
	
	function _get() {
		return $this->db->get($this->_tableName)
	}

	function _getById($id) {
		return $this->db->where("id_".$this->_tableName,$id)->get($this->_tableName);
	}
}
?>