<?php
$conn = new mysqli("localhost", "root","","php-auto");
if($conn->connect_error){
    die("Failed to connect".$conn->connect_error);
}

if(isset($_POST['submit'])){  //check if submit is clicked
    
    $data = $_REQUEST['sel'];  //store the searched data of textbox
    $len = count($data);
    
    foreach($data as $option)
    {
        $sql = "SELECT * from auto_comp where id='$option' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
               echo  "Id :".$row['id']."<br>"." Country : ".$row['country']."<br>";
    } 
}
?>
