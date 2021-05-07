<?php
    include 'includes/session.php';

    if(isset($_POST['addStock'])){
        $id = $_POST['id'];
        $stock = $_POST['stock'];

        $conn = $pdo->open();

        try{
            $stmt = $conn->prepare("UPDATE products SET stock = stock+$stock WHERE id=:id");
            $stmt->execute(['id'=>$id]);

            $_SESSION['success'] = 'Stock added successfully';
        }
        catch(PDOException $e){
            $_SESSION['error'] = $e->getMessage();
        }

        $pdo->close();
    }
    else{
        $_SESSION['error'] = 'Provide required information.';
    }

    header('location: receive_items.php');
?>