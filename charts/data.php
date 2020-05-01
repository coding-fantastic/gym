<?php
	header('Content-type: application/json');
	define ('DB_HOST', '127.0.0.1');
	define ('DB_USERNAME', 'root');
	define ('DB_PASSWORD', '');
	define ('DB_NAME', 'testGym2');

	$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if(!$conn){
		die("Connection failed: ". $conn->error);
	}
	$query = "select Username,Money from users order by Userid";
	$result = mysqli_query($conn,$query);
	
	$data = array();
	$rowNum = mysqli_num_rows($result);
	for( $a=1; $a<=$rowNum; $a++ ){
	foreach ($result as $row){
		$data[] = $row;
	}
	}
	
	/*while($row = mysqli_fetch_assoc($result)){
		foreach($row as $col =>$val){
		echo  $col.' = '.$val;
	        //echo $row['Username'].' '.$row['Money'];
		}
	}*/

	//$data = array();
	//foreach ($result as $row){
	//	$data[] = $row;
	//}

	$result->close();
	$conn->close();
	print json_encode($data);

  ?>
