
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Next</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
    
<?php

 

require_once "database.php";

if(isset($_POST['submit_form']))
{
    $n = $_POST['name'];
    $d = $_POST['aDate'];
    $a = $_POST['age'];
    $g = $_POST['gender'];
    $co = $_POST['contact'];
    $a = $_POST['area_name'];
    $c = $_POST['checkup'];
    $dr = $_POST['doctor'];
    $p = $_POST['practice'];
 
            
    $sql = "SELECT * from user_details where name='$n' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();  
    
      
}
?>
    <div class="container md-9" style="width:50%;padding-bottom:3%; margin-top:5%;">

        <table class="table" style="background-color:lavenderblush;">
        <thead class="thead-dark">
            <tr >
               <th colspan="2" style="text-align: center;background-color:lightcoral;"> <h2>Appointment Details</h2></th> 
            </tr>
        </thead>
            <tbody>
                <tr>
                    <th scope="row">Patient Name</th>
                        <td><?php echo $row['name'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Age</th>
                        <td><?php echo $row['age'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Gender</th>
                        <td><?php echo $row['gender'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Appointment Date</th>
                        <td><?php echo $row['aDate'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Clinic Area</th>
                        <td><?php echo $row['area_name'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Contact No.</th>
                        <td><?php echo $row['contact'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Checkup for</th>
                        <td><?php echo $row['checkupFor'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Doctor</th>
                        <td><?php echo $row['doctorname']." (".$row['drpractice'].")" ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>