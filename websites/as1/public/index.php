<?php
ob_start();
	require 'dbcon.php';
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>ibuy Auctions</title>
		<link rel="stylesheet" href="ibuy.css" />
	</head>

	<body>
	<header>
	<h1><span class="i">i</span><span class="b">b</span><span class="u">u</span><span class="y">y</span></h1>

	<form action="#">
		<input type="text" name="search" placeholder="Search for anything" />
		<input type="submit" name="submit" value="Search" />

		<?php
ob_start();
session_start();

if(isset($_SESSION['username'])) {
    echo '<a href="logout.php">Logout</a>';
    echo '<br>';
    echo '<a href="addAuction.php">Add auction</a>';
	echo '<br>'; 
	echo '<a href="editAuction.php">Edit auction</a>';
	echo '<br>'; 
	echo '<a href="delAuction.php">Delete auction</a>';
} 
if(isset($_SESSION['admin'])) {
    echo '<a href="adminlogout.php">Admin Logout</a>';
	echo '<br>';
    echo '<a href="AddCategory.php">Add Category</a>';
	echo '<br>'; 
	echo '<a href="editCategory.php">Edit Category</a>';
	echo '<br>'; 
	echo '<a href="delCategory.php">Delete Category</a>';
}else {
    echo '<a href="login.php">Login</a>';
}



ob_end_flush();
?>

	</form>
</header>
<!-- 			
			<a href="editAuction.php">Edit Auction?</a>
			<a href="editCategory.php">Edit Category?</a> -->
		</header>

		<nav>
			<ul>
				<li><a class="categoryLink" href="home&garden.php">Home &amp; Garden</a></li>
				<li><a class="categoryLink" href="electronics.php">Electronics</a></li>
				<li><a class="categoryLink" href="fashion.php">Fashion</a></li>
				<li><a class="categoryLink" href="sport.php">Sport</a></li>
				<li><a class="categoryLink" href="health.php">Health</a></li>
				<li><a class="categoryLink" href="toys.php">Toys</a></li>
				<li><a class="categoryLink" href="motors.php">Motors</a></li>
				<?php
				$stmt = $pdo->prepare('SELECT * FROM category');    
$stmt->execute();

foreach ($stmt as $row) {
	echo '<li><a class="categoryLink" href="#">'.$row['title'].'</a></li>';
}
	
?>
				<li><a class="categoryLink" href="#">More</a></li>
			</ul>
		</nav>
		<img src="banners/1.jpg" alt="Banner" />

		<main>

			<h1>Latest Listings / Search Results / Category listing</h1>
			<?php
			  $showBid = isset($_GET['showBid']);
			  $showReview = isset($_GET['showReview']);
			  
			  $stmt = $pdo->prepare("SELECT * FROM auction ORDER BY enddate ASC LIMIT 10");
			  $stmt->execute();
			  
			  foreach ($stmt as $chabi) {
				  echo '<img src="product.png" alt="product name">';
				  echo '<article>';
				  echo '<h2>' . 'Product ID: ' . $chabi['id'] . '</h2>';
				  echo '<h2>' . 'Product name: ' . $chabi['title'] . '</h2>';
				  echo '<h3>' . 'Product category:' . $chabi['category'] . ' </h3>';
				  echo '<p>' . 'Product description:' . $chabi['description'] . '</p>';
				  echo '<p>' . 'Product end date:' . $chabi['enddate'] . '</p>';
				//   echo '</article>';
				//   echo '<p class="price">Current bid: £123.45</p>';
			  
			// 	  if (!$showBid && !$showReview) {
			// 		  echo '<a href="?showBid=true&showReview=true" class="more auctionLink">More &gt;&gt;</a>';
			// 	  }
			  
			// 	  if ($showBid) {
			// 		  require 'bid.php';
			// 	  }
			  
			// 	  if ($showReview) {
			// 		  require 'review.php';
			// 	  }
			  
			// 	  if ($showBid || $showReview) {
			// 		  echo "Review form and bid form have been displayed.";
			// 	  }
			  }
			  
?>
			<!-- <ul class="productList">
				<li>
					<img src="product.png" alt="product name">
					<article>
						<h2>Product name</h2>
						<h3>Product category</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales ornare purus, non laoreet dolor sagittis id. Vestibulum lobortis laoreet nibh, eu luctus purus volutpat sit amet. Proin nec iaculis nulla. Vivamus nec tempus quam, sed dapibus massa. Etiam metus nunc, cursus vitae ex nec, scelerisque dapibus eros. Donec ac diam a ipsum accumsan aliquet non quis orci. Etiam in sapien non erat dapibus rhoncus porta at lorem. Suspendisse est urna, egestas ut purus quis, facilisis porta tellus. Pellentesque luctus dolor ut quam luctus, nec porttitor risus dictum. Aliquam sed arcu vehicula, tempor velit consectetur, feugiat mauris. Sed non pellentesque quam. Integer in tempus enim.</p>

						<p class="price">Current bid: £123.45</p>
						<a href="#" class="more auctionLink">More &gt;&gt;</a>
					</article>
				</li>
				<li>
					<img src="product.png" alt="product name">
					<article>
						<h2>Product name</h2>
						<h3>Product category</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales ornare purus, non laoreet dolor sagittis id. Vestibulum lobortis laoreet nibh, eu luctus purus volutpat sit amet. Proin nec iaculis nulla. Vivamus nec tempus quam, sed dapibus massa. Etiam metus nunc, cursus vitae ex nec, scelerisque dapibus eros. Donec ac diam a ipsum accumsan aliquet non quis orci. Etiam in sapien non erat dapibus rhoncus porta at lorem. Suspendisse est urna, egestas ut purus quis, facilisis porta tellus. Pellentesque luctus dolor ut quam luctus, nec porttitor risus dictum. Aliquam sed arcu vehicula, tempor velit consectetur, feugiat mauris. Sed non pellentesque quam. Integer in tempus enim.</p>

						<p class="price">Current bid: £123.45</p>
						<a href="#" class="more auctionLink">More &gt;&gt;</a>
					</article>
				</li>
				<li>
					<img src="product.png" alt="product name">
					<article>
						<h2>Product name</h2>
						<h3>Product category</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales ornare purus, non laoreet dolor sagittis id. Vestibulum lobortis laoreet nibh, eu luctus purus volutpat sit amet. Proin nec iaculis nulla. Vivamus nec tempus quam, sed dapibus massa. Etiam metus nunc, cursus vitae ex nec, scelerisque dapibus eros. Donec ac diam a ipsum accumsan aliquet non quis orci. Etiam in sapien non erat dapibus rhoncus porta at lorem. Suspendisse est urna, egestas ut purus quis, facilisis porta tellus. Pellentesque luctus dolor ut quam luctus, nec porttitor risus dictum. Aliquam sed arcu vehicula, tempor velit consectetur, feugiat mauris. Sed non pellentesque quam. Integer in tempus enim.</p>

						<p class="price">Current bid: £123.45</p>
					
					</article>
				</li>
			</ul> -->

			<hr />

		  	<?php
				require 'bid.php';
			?>
			<br>
			<br>
			<br>
			<?php
				require 'review.php';
			?>
	
					<!-- <section class="reviews">
						<h2>Reviews of User.Name </h2>
						<ul>
							<li><strong>Ali said </strong> <em>29/09/2019</em></li>
							<li><strong>Dave said </strong> disappointing, product was slightly damaged and arrived slowly.<em>22/07/2019</em></li>
							<li><strong>Susan said </strong> great value but the delivery was slow <em>22/07/2019</em></li>

						</ul>

						<form>
							<label>Add your review</label> <textarea name="reviewtext"></textarea>

							<input type="submit" name="submit" value="Add Review" />
						</form>
					</section>
					</article> -->

					<!-- <hr />
					<h1>Sample Form</h1>

					<form action="#">
						<label>Text box</label> <input type="text" />
						<label>Another Text box</label> <input type="text" />
						<input type="checkbox" /> <label>Checkbox</label>
						<input type="radio" /> <label>Radio</label>
						<input type="submit" value="Submit" />

					</form> -->



			<footer>
				&copy; ibuy 2019
			</footer>
		</main>
	</body>
</html>