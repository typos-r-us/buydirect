<?php
	include 'includes/session.php';

	if(isset($_POST['write_off'])){
		$id = $_POST['id'];
		$quantity=$_POST['quantity'];
		$stock=$_POST['stock'];
		$price=$_POST['price'];

        # echo var_dump($_SESSION);
        #console_log($_SESSION);

		#$user= $admin['id'];
		
		$conn = $pdo->open();

		try{
		    $stock=$stock-$quantity;
			#$stmt = $conn->prepare("DELETE FROM products WHERE id=:id");
            #$stmt = $conn->prepare("UPDATE products SET isRemoved=1 WHERE id=:id");
            $stmt = $conn->prepare("UPDATE products SET stock=:stock WHERE id=:id");
            $stmt .=$conn->prepare("INSERT INTO writeoffs ('id','price','quantity','date_deleted','user_id') VALUES($id,$price,$quantity,date('dd-mm-yyyy'),'')");
            $stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'Product removed successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select product to delete first';
	}

	header('location: products.php');

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
	
?>