<?php
$conn = new mysqli("localhost", "root","","php-auto");
if($conn->connect_error){
    die("Failed to connect".$conn->connect_error);
}
if(isset($_POST['submit1'])){  //check if submit is clicked
$data_ar=array();
    $data=$_POST['searchM'];  //store the searched data of textbox
    $data_ar = explode(',',$data);
    print_r ($data_ar);
   // $row1=array();
   $len = count($data_ar);
   //echo $len;
//    for($i=0;$i<$len;$i++)
foreach($data_ar as $d)
{
    echo $d;
   $sql="SELECT * FROM auto_comp WHERE country='$d' ";
    //$sql="SELECT * FROM auto_comp WHERE country='$data_arr' ";
     $result=$conn->query($sql);

     $row=$result->fetch_assoc();

    echo "ID: ".$row['id']."<br>";
    echo "Country Name: ".$row['country'];
}
    


    //  $tot = $result->num_rows;
    //  echo $tot;

    // while($row=$result->fetch_array())
    // {
    //   $row1[]=$row["id"].' '.$row["country"];
    //   echo $row1;
    // }
    // echo json_encode($row1);
}
if(isset($_POST['submit2']))
{
    $data=$_POST['search'];  //store the searched data of textbox
    $sql="SELECT * FROM auto_comp WHERE country='$data' ";
    $result=$conn->query($sql);
   // $row=$result->fetch_assoc();
    $row=$result->fetch_array();
    
    echo "ID: ".$row['id']."<br>";
    echo "Country Name: ".$row['country'];
}
if(isset($_POST['selectU']))
{
    die("hello");
    $data_ar=array();
    $data=$_POST['selUser'];  //store the searched data of textbox
    $data_ar = explode(',',$data);
    print_r ($data_ar);
    $len = count($data_ar);
    //echo $len;
 //    for($i=0;$i<$len;$i++)
 foreach($data_ar as $d)
 {
     echo $d;
    $sql="SELECT * FROM auto_comp WHERE country='$d' ";
     //$sql="SELECT * FROM auto_comp WHERE country='$data_arr' ";
      $result=$conn->query($sql);
 
      $row=$result->fetch_assoc();
 
     echo "ID: ".$row['id']."<br>";
     echo "Country Name: ".$row['country'];
 }
}


?>