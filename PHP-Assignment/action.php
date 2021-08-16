<?php
    $conn = new mysqli("localhost", "root","","php-auto");
    if($conn->connect_error){
        die("Failed to connect".$conn->connect_error);
    }
    if(isset($_POST['query'])){  //data from AJAX Request
        $inpText=$_POST['query'];
        $query="SELECT country FROM auto_comp WHERE country LIKE '%$inpText%' ";
        $result = $conn->query($query);

        //for checking the no. rows coming from database
        if($result->num_rows>0){
            //for displaying row wise list data
            while($row=$result->fetch_assoc())
            {
                echo "<a href='#' id='action' class='list-group-item list-group-item-action 
                    border-1'>" .$row['country']. "</a>";
            }
        }
        else{
            echo "<p class='list-group-item border-1'>No Record</p>";
        }
    }
?>