vghfghfhgf

<?php

define('DRUPAL_ROOT', getcwd());

 require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
 drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

function student_details()
{
 	$a  = db_query('SELECT * FROM field_data_field_firstname limit 4');
	_dbg($a->fetchAll());
}
student_details();

// //Insert a new row in Stud table
// // $dataArray = array(
// // 	// 'Id' => 108,
// // 	'Name' => 'dddgdgd',
// // 	'Age' => '34',
// // 	);
// // $x = db_insert('Stud')
// // ->fields($dataArray)
// // ->execute();
// //  _dbg($x);

// Use of like operator using db_query function
 $result = db_query(
 	'SELECT * FROM Stud WHERE Name LIKE :pat',
 	array(':pat'=> db_like('A').'%')
 	)
 ->fetchAll();
 _dbg($result);


// Use of like operator using db_select function
 $myTeachers=db_select('Stud',s)
 ->fields('s')
 ->condition('Name', db_like('A') . '%', 'LIKE')
 ->execute()
 ->fetchAll();
_dbg($myTeachers);

//To left join two tables stud & studHobby 

$query = db_select('Stud', 's');
$query->join('studHobby', 'h', 's.Id = h.Id');
$result = $query
  ->fields('s', array('Id', 'Name', 'Age'))
  ->fields('h', array('Hobby'))
  ->execute()
  ->fetchAll();

  $rows = array();	//create an empty array
  $header = array("ID", "Name", "Age", "Hobby");
  foreach ($result as $data){
  	$rows[] = array(
  		$data->Id,
  		$data->Name,
  		$data->Age,
  		$data->Hobby,
  	);
  }

//Update row with Id equals 2
  print theme('table', array(
  	'rows' => $rows,
     'header' => (!empty($rows)) ? $header : '',)
  );

  $ageUpdate = db_update('Stud')
  ->fields(array('Age' => '25'))
  ->condition('Id','2','=')
  ->execute();
  echo "Row updated successfully";











