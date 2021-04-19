<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			//$stmt = $conn->prepare("DELETE FROM users WHERE id=:id");
			// 12th April 2021: Change from delete to update. Recommendation from EKM
            $stmt = $conn->prepare("UPDATE users SET isRemoved=1 WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'User removed successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select user to delete first';
	}

	header('location: users.php');
	
?>