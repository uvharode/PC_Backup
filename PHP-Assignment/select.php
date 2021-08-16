<?php
    $conn = mysqli_connect("localhost", "root","","php-auto");
    if($conn->connect_error){
        die("Failed to connect".$conn->connect_error);
    }
    if(isset($_POST['q']))
    {
        $q = $_POST['q'];
        $query=$conn->prepare("SELECT * FROM auto_comp WHERE country LIKE '%".$q."%' ");
        // $query=mysql_query($conn,"SELECT * FROM auto_comp WHERE country LIKE '%$q%' ")
        // $param = "%$q%";
        // $query->bind_param("ss",$param);
        $data = array();
        if($query->execute()){
            $result = $query->get_result();   

            if($result->num_rows>0){
                while($row=$result->fetch_assoc())
                {
                    $id=$row["id"];
                    $country=$row["country"];
                    $data[] = array("id"=>$id, "text"=>$country);
                }
                $query->close();
            }
            else{
                $data[]=array('id'=>0,'country'=>'No Country Found');
            }
        echo json_encode($data);

        }
    }
?>