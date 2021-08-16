<?php

require_once "database.php";


    if(isset($_POST['name']))
    {
        $n = $_POST['name'];
        $d = $_POST['aDate'];
        $age = $_POST['age'];
        $g = $_POST['gender'];
        $co = $_POST['contact'];
        $a = $_POST['area_name'];
        $c = $_POST['checkup'];
        $ch = implode(',',$c);
        $dr = $_POST['doctor'];
        $p = $_POST['practice'];
        
       
            $sql = "INSERT INTO `user_details` (`name`,`age`,`gender`,`aDate`,`contact`,`area_name`,`checkupFor`,`drpractice`,`doctorname`) 
                        VALUES ('$n','$age','$g', '$d', '$co','$a', '$ch', '$p', '$dr')"; 

            if(mysqli_query($conn, $sql))
            {
                echo json_encode(array(
                                     'statusCode' => 200,
                                      )
                                );
            }
            else
            {
                echo json_encode(array(
                                     'statusCode' => 201,
                                      )
                                );
            }
            mysqli_close($conn);
    }

    if(isset($_POST['query']))
    {
        $input = $_POST['query'];
        $sql = "SELECT area_name FROM `area` WHERE area_name LIKE '%$input%' ";
        $result = $conn->query($sql);

        if($result->num_rows>0)
        {
            while($row=$result->fetch_assoc())
            {
                echo "<a href='#' id='action' class='list-group-item list-group-item-action 
                border-1'>" .$row['area_name']. "</a>";
            }
        }
        else
        {
            echo "<p class='list-group-item border-1'>No Record</p>";
        }
    }

    if(isset($_POST['checkup']))
    {
        $input = $_POST['checkup'];
        $sql = "SELECT * FROM `checkuplist` WHERE checkupFor LIKE '%$input%' ";
        $result = mysqli_query($conn,$sql);
        
        $data = array();

            while($row= mysqli_fetch_array($result))
            {
                $data[] = array("id"=>$row['checkupFor'], "text"=>$row['checkupFor']);
            }
            echo json_encode($data);
      
    }

    if(isset($_POST['practiceName']))
    {
        $input = $_POST['practiceName'];
        $sql = "SELECT * FROM doctorlist where practice = '$input' ";
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_array($result))
        {
            echo "<option  value='".$row['doctor_name']."'>".$row['doctor_name']."</option>";
        }
    }



?>