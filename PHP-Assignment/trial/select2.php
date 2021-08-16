<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row">
        <div class="col-md-10 offset-md-2 bg-light p-4 mt-3 rounded">
            <form action="getDetails.php" method="post" autocomplete="off" class="form-inline p-3">
                <!-- <div class="row"> -->
                    <div class="col-md-8">
                        <h4>With text field content</h4>
                        <input id="txt1" name="txt1" type="text" multiple="multiple" placeholder="Search countries..." style="width: 60%;">
                    </div>
                    <div class="col-md-4">
                        <a onclick="btn_handler()" class="btn btn-primary" style="width: 40%;">Submit</a>
                    </div>

                    <!-- ----------------------------------- -->

                    <div class="col-md-8">
                        <h4>With Select field</h4>
                        <select id="sel" class="sel" name="sel[]" multiple="multiple" placeholder="Search countries..." style="width: 60%;" >

                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="submit" name="submit" value="submit" class="btn btn-primary" style="width: 40%;">
                    </div>
                    <!-- ----------------------------------- -->
                    <div class="col-md-8">
                        <h4>With text field ajax</h4>
                        <input id="txt2" name="txt2" type="text" multiple="multiple" placeholder="Search countries..." style="width: 60%;">
                    </div>
                    <div class="col-md-4">
                        <a onclick="btn_handler3()" class="btn btn-primary" style="width: 40%;">Submit</a>
                    </div>
                <!-- </div> -->
        </form>
    </div>
    </div>
</div>
</body>

<script>
    // $(document).ready(function(){

    var content = [
                    { id: 0, text: "india" },
                    { id: 1, text: "korea" },
                    { id: 2, text: "japan" },
                    { id: 3, text: "china" },
                  ];

    $("#txt1").select2({
        data: content,
        delay: 250,
        minimumInputLength: 1,
        width: '100%',
        multiple: true,
        placeholder: "Enter First Name",

    });

    function btn_handler() {
        var data = $('#txt1').select2('data');
        data.forEach(function(item) {
            alert(item.text);
        });
    }

    // ---------------------------------------------------------
    $(".sel").select2({
        placeholder: "Type Here",
        minimumInputLength: 1,
        multiple: true,

        ajax: {
            url: "getData.php",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    searchTerm: params.term
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
   

    //----------------------------------------------------------
    $("#txt2").select2({
        minimumInputLength: 1,
        width: '100%',
        multiple: true,
        placeholder: "Enter First Name",
        ajax: {
            url: "getData.php",
            type: "post",
            dataType: 'json',
            delay: 250,
            async: true,
            data: function(params) {
                return {
                    searchTerm: params.term
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

    function btn_handler3() {
        var data = $('#txt2').select2('data');
        alert(data[0].text)
    }

    // });
</script>

</html>