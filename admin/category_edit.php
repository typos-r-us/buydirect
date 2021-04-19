<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$slug = $_POST['slug'];

		try{
		    $slug = slugify($name); # Generate new slug
			$statement = $conn->prepare("UPDATE category SET name=:name, cat_slug=:slug WHERE id=:id");
			$statement->execute(['name'=>$name, 'slug'=>$slug, 'id'=>$id]);
			$_SESSION['success'] = 'Category updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['Error. '] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['Error. '] = 'Please complete the category edit form';
	}

	header('location: category.php');

?>