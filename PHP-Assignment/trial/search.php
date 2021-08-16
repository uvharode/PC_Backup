<?php
$stmt = $conn->prepare('select * from product where name like :name');
$stmt->bindValue('name', '%'.$_GET['term'].'%');
$stmt->execute();
$products = array();
while(($product = $stmt->fetch(PDO::FETCH_OBJ))) {
	array_push($products, $product->name);
}
echo json_encode($products);
?>