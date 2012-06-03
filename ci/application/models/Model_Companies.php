<?php 
class Model_Companies extends MY_Model {

	function __construct() {
		parent::__construct();
	}
	
	
	function getCompaniesByService($id)
	{
		$company = $this -> db -> query("	SELECT `c`.*
										FROM `greenjobs`.`services` AS `s`
										INNER JOIN `greenjobs`.`companies` AS `c` 
										ON (`s`.`id_companies` = `c`.`id_companies`);");
		return $company;
	}
	
	function getCompanyServices($id)
	{
		$services = $this -> db -> query("	SELECT `s`.* FROM `greenjobs`.`services` AS `s`
											INNER JOIN `greenjobs`.`companies` AS `c` 
											ON (`s`.`id_companies` = `c`.`id_companies`) WHERE c.id_companies = $id");
		return $services;
	}
	
	function getCompanyJobs($id)
	{
		$jobs = $this -> db -> query(	"SELECT `j`.* FROM `greenjobs`.`jobs` AS `j`
										INNER JOIN `greenjobs`.`companies` AS `c` 
										ON (`j`.`id_companies` = `c`.`id_companies`) WHERE c.id_companies = $id");
										
		return $jobs;
	}
	
	function detailView()
	{
		
	}
} 