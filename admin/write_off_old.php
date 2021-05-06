<?php
    include 'includes/session.php';

    if(isset($_POST['writeOff'])){
        $id = $_POST['id'];
        $stock = $_POST['stock'];

        $conn = $pdo->open();

        try{
            $stmt = $conn->prepare("UPDATE products SET stock = stock-$stock WHERE id=:id");
            $stmt->execute(['id'=>$id]);

            $_SESSION['success'] = 'Stock reduced successfully.';
        }
        catch(PDOException $e){
            $_SESSION['error'] = $e->getMessage();
        }

        $pdo->close();
    }
    else{
        $_SESSION['error'] = 'Please provide required information.';
    }

    header('location: write_off_items.php');
?>