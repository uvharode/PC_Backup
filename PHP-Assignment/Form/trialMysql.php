<?php
    $conn = mysqli_connect("localhost", "root","","php-july");
    if($conn->connect_error){
        die("Failed to connect".$conn->connect_error);
    }
    if(isset($_POST['checkup'])){
        $search = $_POST['checkup'];   
        $fetchData = mysqli_query($conn,"SELECT * FROM checkuplist WHERE checkupFor LIKE '%".$search."%' ");
      }
      $data = array();
while ($row = mysqli_fetch_array($fetchData)) {    
  $data[] = array("id"=>$row['id'], "text"=>$row['checkupFor']);
}
echo json_encode($data);

?>