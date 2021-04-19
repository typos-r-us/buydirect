
<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$slug = $_POST['cat_slug'];

		$conn = $pdo->open();
    # check if category name exists
		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM category WHERE name=:name");
		$stmt->execute(['name'=>$name]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Category already exist';
		}
		else{
			try{
			    //$isRemoved=0;
                $slug = slugify($name); // generate the cat_slug
				$stmt = $conn->prepare("INSERT INTO category (name,buydirect.category.cat_slug) VALUES (:name,:cat_slug)");
				$stmt->execute(['name'=>$name,'cat_slug'=>$slug]);
				$_SESSION['success'] = 'Category added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Please complete the category form';
	}

	header('location: category.php');

?>