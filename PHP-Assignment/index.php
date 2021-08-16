<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Populated Search</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' rel='stylesheet' type='text/css'>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js'></script>


    <!-- Bootstrap/JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>


</head>
<body class="bg-warning">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 bg-light p-4 mt-3 rounded">
                <h4>Search Countries</h4>
                <!-- Form -->
                <form action="details.php" method="post" autocomplete="off" class="form-inline p-3">
                    <input type="text" name="search" id="search" multiple="multiple"
                        class="form-control form-control-lg rounded-0 border-warning" placeholder="Search Here" 
                        style="width: 80%;">
                    <input type="submit" name="submit2" value="Search"
                        class="btn btn-warning btn-lg rounded-0" style="width: 20%;">
                </form>
            </div>
            <div class="col-md-5" style="position: relative; margin-top:-38px; margin-left:215px;">
                <div class="list-group" id="show-list">
                   
                </div>
            </div>
            <!-- Multiselect -->
            <div class="col-md-8 offset-md-2 bg-light p-4 mt-3 rounded">
                <h4>Search Multiple Countries</h4>
                <!-- Form -->
                <form action="details.php" method="post" autocomplete="off" class="form-inline p-3">
                    <input type="text" name="searchM" id="searchM" 
                        class="form-control form-control-lg rounded-0 border-warning" placeholder="Search Here" 
                        style="width: 80%;">
                        <input type="submit" name="submit1" value="Search"
                        class="btn btn-warning btn-lg rounded-0" style="width: 20%;">
                        <!-- <button type="button" name="submit1" id="submit1" class="btn btn-warning btn-lg rounded-0" style="width: 20%; height:fit-content;" >Select</button> -->
                </form>
            </div>
            <div class="col-md-5" style="position: relative; margin-top:-38px; margin-left:215px;">
                <div class="list-group" id="multi-list">
                   
                </div>
            </div>

            <!-- Select2 -->
            <div class="col-md-8 offset-md-2 bg-light p-4 mt-3 rounded">
            <h4>Select2 Multiple Search</h4>

                <h4>Select</h4>
                <!-- Form -->
                <form action="details.php" autocomplete="off" class="form-inline p-3 bg-danger">
                    
                    <div style="width:100%; padding-bottom:20%;">
                       <input type="text" name="select" id="select" multiple="multiple"
                        class="form-control form-control-lg rounded-0 border-warning" placeholder="Search Here" 
                        style="width: 80%;">   
                        <a  id="btn_handler" class="btn btn-primary">Submit</a>
                        <!-- <a  onclick="btn_handler()" class="btn btn-primary">Submit</a> -->
                    </div>
                    </form>
                   
                    <h4>Select2</h4>

                       <form action="details.php" autocomplete="off" class="form-inline p-3 bg-info">
                    <div style="width:100%; padding-bottom:20%;">
                       <input type="text" name="select2" id="select2" multiple="multiple"
                        class="form-control form-control-lg rounded-0 border-warning" placeholder="Search Here" 
                        style="width: 80%;">
                        <input type="submit" id="s1" name="s1" value="Search"
                        class="btn btn-warning btn-lg rounded-0" style="width: 20%;">
                    </div>  
                      </form>
                    <div class="col-md-5" style="position: relative; margin-top:-38px; margin-left:215px;">
                <div class="list-group" id="s-list">
                   
                </div>
            </div>
                    
                        <h4>selUser</h4>
                       <form action="details.php" autocomplete="off" class="form-inline p-3 bg-danger">
                    <div style="width:100%; padding-bottom:20%;">
                       <select id="selUser" name="selUser" style="width: 200px;" multiple="multiple">
                        <option value='0'>- Search user -</option>
                       </select>
                       <input type="submit" id="selectU" name="selectU" value="Search"
                        class="btn btn-warning btn-lg rounded-0" style="width: 20%;">                 
                    </div>

                        <!-- <button type="button" name="submit1" id="submit1" class="btn btn-warning btn-lg rounded-0" style="width: 20%; height:fit-content;" >Select</button> -->
                </form>
            </div>
            <div class="col-md-5" style="position: relative; margin-top:-38px; margin-left:215px;">
                <div class="list-group" id="select-list">
                   
                </div>
            </div>

        </div>
    </div>
    <!-- Javascript and AJAX -->
    <script type="text/javascript">
        $(document).ready(function(){

            $("#search").keyup(function(){            //targeting the search textbox using id-------------
                var searchText = $(this).val();
                if(searchText!=''){
                    $.ajax({
                        url: 'action.php',
                        method: 'post',
                        data: {query:searchText},
                        success: function(response){
                           // response = JSON.parse(response);
                            //response(response);
                             $("#show-list").html(response); //response coming from the server will be shown 
                        }
                    });
                }
                else{
                    $("#show-list").html('');
                }
            });

            $(document).on('click','#action',function(){ //after selecting country-row
               $("#search").val($(this).text()); //it will set that data value in text box
               $("#show-list").html('');
               
            });

//-------------------------------------------------------------------//

            $('#searchM').tokenfield({                
            autocomplete :{                           
                    source: function(request, response)         //call back function
                    {
                        jQuery.post('fetch.php',{
                            query : request.term
                        }, function(data){
                            data1=JSON.parse(data);
                           $d = response(data1);
                             $("#multi-list").html(d);
                        });                       
                    },
                    delay: 100
                }
            });
        
            $('#submit1').click(function(){
                $("#searchM").val($(this).text());
                $("#multi-list").html('');

            });

//-------------------------------------------------------------------//

            var content = [
                {id: 0, text: "india"},
                {id: 1, text: "china"},
                {id: 2, text: "korea"},
            ];

            $("#select").select2({
                // data: content,
                minimumInputLength: 1,
                multiple: true,
                placeholder: "enter Country",
                ajax: {
                   url: 'getData.php',
                   type: 'post',
                   dataType: 'json',
                   data: function (params) {
                        return {
                            searchTerm: params.term // search term
                               };
                            },
                    processResults: function (response) {
                         return {
                             results: response
                                 };
                             },
                    cache: true
                    }
            });

            $('#btn_handler').click(function(){
                var data = $('#select').select2('data');
               alert(data[0].text);
             });
            // function btn_handler() {
            //    var data = $('#select').select2('data');
            //    alert(data[0].text)
            // }

//-------------------------------------------------------------------//

            $("#select2").select2({            //targeting the search textbox using id-------------
               placeholder:"Type Here",
               minimumInputLength: 1,
               multiple: true,
               ajax:{
                   url: "select.php",
                   type: "post",
                   dataType: 'json',
                   delay: 250,
                   data: function(params){
                       return{
                           q: params.term,
                       };
                   },
                   processResults:function(data){
                    
                       return{
                           results: data
                       };
                   },

                   cache:true
               },
           
            });
//-------------------------------------------------------------------//
            
$("#selUser").select2({
    placeholder:"Type Here",
               minimumInputLength: 1,
               multiple: true,
  ajax: { 
   url: "getData.php",
   type: "post",
   dataType: 'json',
   delay: 250,
   data: function (params) {
    return {
      searchTerm: params.term // search term
    };
   },
   processResults: function (response) {
     return {
        results: response
     };
   },
   cache: true
  }
 });

//  $('#selectU').click(function(){
//                 $("#selUser").val($(this).text());
//                 // alert("hii");
//                 // $("#multi-list").html('');
//  });

        });
    </script>
</body>
</html>