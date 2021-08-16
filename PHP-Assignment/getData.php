<?php
    $conn = mysqli_connect("localhost", "root","","php-auto");
    if($conn->connect_error){
        die("Failed to connect".$conn->connect_error);
    }
    if(isset($_POST['searchTerm'])){
        $search = $_POST['searchTerm'];   
        $fetchData = mysqli_query($conn,"SELECT * FROM auto_comp WHERE country LIKE '%".$search."%' ");
      }
      $data = array();
while ($row = mysqli_fetch_array($fetchData)) {    
  $data[] = array("id"=>$row['id'], "text"=>$row['country']);
}
echo json_encode($data);

?>