<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue-light layout-top-nav">
<div class="wrapper">
<link href="includes/contact.css" rel="stylesheet"/>
	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
                    <h2>Please submit the form below to contact us.</h2>
                        <div class="wrapper">
                            <form method="post" action="" class="ccform">
                                <div class="ccfield-prepend">
                                    <span class="ccform-addon"><i class="fa fa-user fa-2x"></i></span>
                                    <input class="ccformfield" type="text" placeholder="Full Name" required>
                                </div>
                                <div class="ccfield-prepend">
                                    <span class="ccform-addon"><i class="fa fa-envelope fa-2x"></i></span>
                                    <input class="ccformfield" type="text" placeholder="Email" required>
                                </div>
                                <div class="ccfield-prepend">
                                    <span class="ccform-addon"><i class="fa fa-mobile-phone fa-2x"></i></span>
                                    <input class="ccformfield" type="text" placeholder="Phone">
                                </div>
                                <div class="ccfield-prepend">
                                    <span class="ccform-addon"><i class="fa fa-info fa-2x"></i></span>
                                    <input class="ccformfield" type="text" placeholder="Subject" required>
                                </div>
                                <div class="ccfield-prepend">
                                    <span class="ccform-addon"><i class="fa fa-comment fa-2x"></i></span>
                                    <textarea class="ccformfield" name="comments" rows="8" placeholder="Message" required></textarea>
                                </div>
                                <div class="ccfield-prepend">
                                    <input class="ccbtn" type="submit" value="Submit">
                                </div>
                            </form>
                        </div>
                    <hr>
		            <h2>Browse Our Popular Items Below and Keep Up With The Latest Trends!</h2>
		       		<?php
		       			$month = date('m');
		       			$dbConnection = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $summary = $dbConnection->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
						    $summary->execute();
						    foreach ($summary as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<div class='col-sm-4'>
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
		       									<img src='".$image."' width='100%' height='230px' class='thumbnail'>
		       									<h5><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
		       								</div>
		       								<div class='box-footer'>
		       									<b>KSh. ".number_format($row['price'], 2)."</b>
		       								</div>
	       								</div>
	       							</div>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>