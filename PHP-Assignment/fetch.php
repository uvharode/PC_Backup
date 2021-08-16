<?php
    $conn = new mysqli("localhost", "root","","php-auto");
    if($conn->connect_error){
        die("Failed to connect".$conn->connect_error);
    }

    $data = array();
    if(isset($_POST['query']))
    {
        $inpText=$_POST['query'];
        $query="SELECT country FROM auto_comp WHERE country LIKE '%$inpText%' ";
        $result = $conn->query($query);

        if($result->num_rows>0)
        {
            while($row = $result->fetch_assoc())   //result into array
            {
                $data[] = $row["country"];
                // $data[] = "<a href='#' id='fetch' class='list list-group-item list-group-item-action 
                // border-1'>" .$row['country']. "</a>";
            }
           echo json_encode($data);

            // echo json_encode("<a href='#' class='list-group-item list-group-item-action 
            // border-1'>" .$data. "</a>");       
         }
    
    }
    
?>  