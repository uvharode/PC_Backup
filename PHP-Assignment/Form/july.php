<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>July</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>

    .form-field input {
        border: solid 2px #f0f0f0;
        border-radius: 3px;
        padding: 10px;
        margin-bottom: 5px;
        font-size: 14px;
        display: block;
        width: 100%;
    }
    .form-field input:focus {
    outline: none;
}

    .form-field.error input {
        border-color:red;
    }
    .form-field.success input {
        border-color:green;
    }

    small{
        color: red;
    }

    </style>

</head>
<body> <!-- class="bg-warning" -->
    <div class="container md-9 bg-danger" style="width:50%;">
        <div class="row g-3">
            <div class="col-md-12 offset-md-2 bg-dark p-4 mt-3 rounded" style="margin:auto;">
                    <h1 style="text-align:center;">Appoinment Fixer</h1>
                <!-- FORM-->
                <div class="alert alert-success" id="success" style="display: none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                </div>
                <div class="alert alert-danger" id="error" style="display: none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                </div>
                <!-- <div class="alert alert-warning alert-dismissible" id="warning" style="display: none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&lotimes;</a>
                </div> -->
                <div class="alert alert-warning alert-dismissible" id="warning" style="display: none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Fill all the fields !!</strong>
                </div>
                <!-- onsubmit="return Validate()" -->
                    <form id="myForm" class="form" method="post" action="next.php" novalidate autocomplete="off" 
                      style="padding-left:15%;">
                    <div class="form-field col-md-12">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" name="name" id="name" 
                            class="form-control form-control-lg rounded-0 border-warning" 
                            placeholder="Write your name" 
                            required
                            style="width: 80%;"
                            > 
                            <small></small>                                            
                    </div>
                  
                        
                        <!-- <div class="form-group col-md-5 ">
                            <label for="age">Age</label>
                            <input type="number" name="age" id="age" 
                            class="form-control form-control-lg rounded-0 border-warning" 
                            placeholder="Write your age" 
                            required
                            style="width: 80%;"
                            >
                        </div>
                        <div class="form-check form-check-inline col-md-7">
                        <label for="gender">Gender</label><br>
                            <input class="form-check-input" type="radio" name="gender" id="female" value="Female" style="width: 5%;">
                            <label class="form-check-label" for="female">Female</label>
                            <input class="form-check-input" type="radio" name="gender" id="male" value="Male" style="width: 5%;">
                            <label class="form-check-label" for="male">Male</label>
                            <input class="form-check-input" type="radio" name="gender" id="other" value="Other" style="width: 5%;">
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="area_name">Area</label>
                            <input type="text" name="area_name" id="area_name"
                            class="form-control form-control-lg rounded-0 border-warning" 
                            placeholder="Select clinic area" 
                            required
                            style="width: 80%;"
                            >
                        </div>
                        <div class="list-group col-md-12" id="area-list">
                            //-- -------------area list---------------- 
                        </div> 

                        <div class="form-group col-md-6">
                            <label for="aDate">Appointment Date</label>
                            <input type="date" name="aDate" id="aDate"
                            class="form-control form-control-lg rounded-0 border-warning" 
                            required
                            style="width: 80%;"
                            >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contact">Contact</label>
                            <input type="tel" name="contact" id="contact" maxlength="10"
                            class="form-control form-control-lg rounded-0 border-warning" 
                            placeholder="Contact details" 
                            required
                            style="width: 57%;"
                            >
                        </div>
                        
                       
                       
                        <div class="form-group col-md-12">
                            <label for="checkup">Checkup for</label><br>
                            <select name="checkup[]" id="checkup"
                            multiple="multiple"
                            required
                            class="form-control form-control-lg rounded-0 border-warning" 
                            style="width: 80%;"
                            >
                            //-- -------------checkup list---------------- 
                            </select>
                        </div>  
                        -->

                         <div class="form-field success col-md-12">
                            <label for="practice">Practice</label>
                            <select name="practice" id="practice" 
                            class="form-control form-control-lg rounded-0 border-warning" 
                            required
                            style="width: 80%;"
                            >
                            <option value="">Select Practice</option>
                                <?php
                                require_once "database.php";
                                $result = mysqli_query($conn, "SELECT * FROM practicelist");
                                while($row = mysqli_fetch_array($result))
                                {
                                ?>
                                <option value="<?php echo $row['practiceName']; ?>"> <?php echo $row["practiceName"]; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-field col-md-12">
                            <label for="doctor">Doctor</label>
                            <select name="doctor" id="doctor"
                            class="form-control form-control-lg rounded-0 border-warning" 
                            required
                            style="width: 80%;"
                            >                       
                            </select>
                        </div>

                        <div>
                        <!-- onclick="validateForm('myForm')"  -->
                        <input type="submit" name="submit_form" id="submit_form" 
                            class="col-md-11 btn btn-primary btn-lg rounded-0" 
                            style="width: 20%;" 
                        >
                        </div>
                    </form>                 
            </div>
        </div>
    </div>
</body>
<script>

  
    // --------------------------------------------

    // function Validate(){
    //     var x = document.forms["myForm"]["name"].value;
    //     if(x == ""){
    //         alert ("Name must be filled");
    //         // name_error
    //         $("#name_error").innerHTML('Name must be filled');
    //         return false;
    //     }
    // }

    const nameE = document.querySelector('#name');
    const practiceE = document.querySelector('#practice');
    const doctorE = document.querySelector('#doctor');
    
    const form = document.querySelector('#myForm');
        form.addEventListener("submit", function(e)
        {
            e.preventDefault(); 
            //----- ye use kre se output screen per data ni aara

            let isNameValid = checkName();

            if (isNameValid){
                form.submit();

            }
        });

        form.addEventListener('input', function (e){
            switch (e.target.id){
                case 'name':
                    checkName();
                    break;
            }
        })

    const isRequired = value => value === '' ? false : true;

    const showError = (input, message) => {
        const formField = input.parentElement;
        formField.classList.remove('success');
        formField.classList.add('error');

        const error = formField.querySelector('small');
        error.textContent = message;

    };

    const showSuccess = (input) => {
        const formField = input.parentElement;
        // formField.classList.remove('error');
        formField.classList.add('success');

        const error = formField.querySelector('small');
        error.textContent = '';

    };

    const checkName = () => {
        let valid = false;
        const name = nameE.value.trim();

        if(!isRequired(name))
        {
            showError(nameE, 'Name cannot be blank');
        } else {
            showSuccess(nameE);
            valid = true;
        }
        return valid;
    }


    $("#submit_form").on('click', function(){
        var name = $('#name').val();
        var aDate = $('#aDate').val();
        var age = $('#age').val();
       
        var gender = $('input[type="radio"]:checked').val();

        var contact = $('#contact').val();
        var area_name = $('#area_name').val();
        var checkup = $('#checkup').val();
        var practice = $('#practice').val();
        var doctor = $('#doctor').val();
        if(name!="" && aDate!="" && age!="" && area_name!="" && checkup!="" && contact!="" && doctor!="" && practice!="")
        {
            $.ajax({
                url: "data.php",
                type: "POST",
                dataType: 'json',
                data: {
                    name: name,
                    aDate: aDate,
                    age: age,

                    gender: gender,

                    contact: contact,
                    area_name: area_name,
                    checkup: checkup,
                    practice: practice,
                    doctor: doctor
                },
                cache: false,
                success: function(result)
                {
                    var result = result;
                    // if(result.statusCode==200)
                    // {
                    //     $("#success").show();
                    //     $("#success").html('Appoinment Successfull');
                    // }
                    // else if(result.statusCode==201)
                    // {
                    //     $("#error").show();
                    //     $("#error").html('Error occur');
                    // }
                }
            });
        }
        else
        {
            // $("#warning").show();
            // $("#warning").html('Please fill all the field');       
        }
    });


    $("#area_name").keyup(function(){
        var aText = $(this).val();
        if(aText!='')
        {
            $.ajax({
                url: "data.php",
                type: "POST",
                data: {query:aText},
                success: function(response){
                    $("#area-list").html(response);
                }
            });
        }
        else{
            $("#area-list").html('');
        }
    });

    $(document).on('click','#action',function(){
        $("#area_name").val($(this).text());
        $("#area-list").html('');
    });
// --------------------------------------------------------------------------
    

    $("#checkup").select2({
        placeholder: "Checkup for",
        minimumInputLength: 1,
        multiple: true,
        ajax: {
            url: "data.php",
            type: "POST",
            dataType: 'json',
            delay: 250,
            data: function(params)
            {
                return{
                    checkup: params.term
                };
            },
            processResults: function(response)
            {
                return{
                    results: response
                };
            },
            cache: true
        }
    });

    $("#practice").on('change',function(){
        var practiceName = $(this).val();
        if(practiceName!='')
        {
            $.ajax({
                url: "data.php",
                type: "POST",
                data: {practiceName:practiceName},
                cache: false,
                success: function(response){
                    $("#doctor").html(response);
                } 
            });
        }
    });

    // ----------------------VALIDATION-----------------------

    function validateForm()
    {
        var x = document.forms["form"]["name"].value;
        var text;
        if (x == "")
        {
            text = "All fields must be fill";
        }
        document.getElementById("v_name").innerHTML = text;
    }

    // function formValid()
    // {
    //     var form = document.querySelectorAll('.form-validation')

    //     Array.prototype.slice.call(forms)
    //     .forEach(function(form){
    //         form.addEventListener('submit',function(event){
    //             if(!form.checkValidity()){
    //                 event.preventDefault()
    //                 event.stopPropagation()
    //             }
    //             form.classList.add('was-validated')
    //         }, false)
    //     })
    // }

</script>
</html>