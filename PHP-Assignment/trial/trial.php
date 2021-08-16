<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Autocomplete Multiselect</title>
    <link href="css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/normalize.min.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui.css" />
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <script src="js/vendor/modernizr-2.6.2.min.js" type="text/javascript"></script>
</head>
<body>
    <div class="wrapper" style="margin-top:150px;">
    	<form method="post">
        	<input id="myAutocomplete" type="text" />
        	<input type="submit" value="Search" name="buttonSearch">
        </form>
        <?php
        	$products = array();
        	if(isset($_POST['buttonSearch'])) {
        		if(isset($_POST['keywords'])) {
	        		foreach($_POST['keywords'] as $keyword) {
	        			$stmt = $conn->prepare('select * from product where name like :name');
						$stmt->bindValue('name', '%'.$keyword.'%');
						$stmt->execute();
	        			while(($product = $stmt->fetch(PDO::FETCH_OBJ))) {
							array_push($products, $product);
						}
	        		}
        		}
        	}
        ?>
        <?php if(count($products) != 0) { ?>
        	<table border="1">
        		<tr>
        			<th>Id</th>
        			<th>Name</th>
        			<th>Price</th>
        			<th>Quantity</th>
        		</tr>
        		<?php foreach ($products as $product) { ?>
        			<tr>
        				<td><?php echo $product->id; ?></td>
        				<td><?php echo $product->name; ?></td>
        				<td><?php echo $product->price; ?></td>
        				<td><?php echo $product->quantity; ?></td>
        			</tr>
        		<?php } ?>
        	</table>
        <?php } ?>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.autocomplete.multiselect.js"></script>
    <script type="text/javascript">
        $(function(){

        	function split(val) {
                return val.split(/,\s*/);
            }

            function extractLast(term) {
                return split(term).pop();
            }

            $('#myAutocomplete').autocomplete({
            	source: function (request, response) {
	                $.getJSON('search.php', {
	                    term: extractLast(request.term)
	                }, response);
	            },
	            multiselect: true
            });
        })
    </script>
</body>
</html>
