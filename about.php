<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue-light layout-top-nav">
<div class="wrapper">

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
		            <h2>Kenya's Leading Electronics Super Store!</h2>
                    <p>
                        <b>BuyDirect</b> is a brand of domestic appliances. Ownership of the brand is split between 3 experienced Kenyan retail companies.
                        The brand focuses on making high quality household brands accessible to the Kenyan shopper.
                        <br><br>
                        Founded on the philosophy of Customer Value and Service. The company's success is dependent on building and maintaining customer loyalty.
                        <br><br>
                        Through strong supplier partnerships, we expect to provide customers with quality products featuring the latest technology, while offering unparalleled after-sales service.
                        Our Vision
                        To enhance the lifestyle of our Eastern African Customers
                        <br><br>

                        <b>Our Mission</b>
                        <br>
                        <ul>
                            <li>
                                To supply and support domestic and commercial electronic appliances
                            </li>
                        </ul>

                        <br>

                        <b>Our Core Values</b>
                        <ul>
                            <li> Integrity and Excellence</li>
                            We absolutely believe in doing the right thing: for our customers, our people and all stakeholders.
                            <li>Teamwork, Empowerment and Growth</li>
                            We develop ourselves as people, and we work collaboratively between individuals, departments, locations and levels.
                        </ul>
                    </p>
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