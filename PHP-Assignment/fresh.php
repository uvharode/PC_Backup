<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/select2/3.4.8/select2.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/select2/3.4.8/select2.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<!-- <input type="text" id="myInputEle"/> -->
<div style="width:80%; padding-bottom:20%;">
    <input type="text" name="select2" id="select2" multiple="multiple"
        class="form-control form-control-lg rounded-0 border-warning" placeholder="Search Here" 
        style="width: 80%;">
    <input type="submit" id="s1" name="s1" value="Search"
        class="btn btn-warning btn-lg rounded-0" style="width: 20%;">
</div>

<script>
$(document).ready(function() {
$('#select2').select2({
    width: '100%',
    minimumInputLength: 1,
    // allowClear: true,
    multiple: true,
    placeholder: "Start typing",
    ajax:{
        // url: "getData.php",
        url: "select.php",
        type: "post",
        dataType: 'json',  
        delay: 250,
        data: function(params)
        {
            return{
                // searchTerm: params.term,
                q: params.term,
            };
        },
        processResults: function(data)
        {
            return{
                results: data
            };
        },
        cache: true 
     }
});
});
</script>

</body>
</html>

