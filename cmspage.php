<?php
function dbConnect() {
    $host = 'your remote hosting server name here';
    $db = 'your database name';
    $user = 'Your user name to your db or user priviledge setup';
    $pwd = 'password to db or user priviledge setup';

    $conn = new mysqli($host, $user, $pwd, $db);

    if (mysqli_connect_errno()) {  //this returns a number if there's an error or a zero on success
        echo "<p class='error'>Error: Could not connect to database.<br/>
        Please try again later.</p>";
        exit;
    }

   return $conn;
}

$conn = dbConnect();


   $query = 'SELECT page, title, para FROM content
           WHERE page LIKE ?'; //put in question marks for each piece of data.
   $current_page = basename($_SERVER['SCRIPT_FILENAME']);
   $stmt = $conn->stmt_init(); //initializes the prepared statement
   $stmt = $conn->prepare($query); //constructs the resource you use to do the actual processing
    //replacing the question marks with the actual values is known as binding the parameters (this protect the db from SQL injection)
    //b for binary, d for double(floating point number, i for integer, s for string
   $stmt->bind_param('s', $current_page); //tells PHP which variables should be substituted for the ? s is string
   $stmt->execute(); //to actually run the query
   $stmt->bind_result($page, $title, $para); //provides a list of variables to store the results of the query-same order as query list
   $stmt->store_result(); //tells PHP to retrieve and buffer all of the rows returned from the query
   $numRows = $stmt->num_rows; //now you access the number of rows here


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width,initial-scale=1">
  	<link href="css/styles.css" rel="stylesheet" type="text/css">
    <title>Layout</title>
  </head>
  <body>
  	<div id="wrapper">
	  	<header>
	  		<nav>
	  			<ul>
		  			<li><a href="#">Home</a></li>
		  			<li><a href="#">Services</a></li>
		  			<li><a href="#">Products</a></li>
		  			<li><a href="#">About</a></li>
		  			<li><a href="#">Contact</a></li>
	  			</ul>
	  		</nav>
	  	</header>
	  	<section id="content">
	  		<section id="tag">
	  			<img src="logo.png" alt="Company Logo"/>
	  			<h1>Our Tag Line for our Company</h1>
	  		</section>
        <div id="three">
	  		<article id="unique">
	  			<section class="box">
	  				<h2>What Makes Us Unique #1</h2>
	  				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry and has been the industry's standard dummy text.</p>
	  			</section>
	  			<section class="box">
	  				<h2>What Makes Us Unique #2</h2>
	  				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
	  			</section>
	  			<section class="box">
	  				<h2>What Makes Us Unique #3</h2>
	  				<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.</p>
	  			</section>
	  		</article>
	  		<section id="topics">
		  		<article id="main">
          <?php if (isset($numRows)) {
            while($stmt->fetch()) { ?>
            <h1><?=$title; ?></h1>
          <p><?=$para; ?></p>
        <?php } ?>
      <?php } ?>
           ?>
		  			<h1>The First Main Topic of this Page</h1>
		  			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet rhoncus dolor id placerat. Vestibulum gravida nunc non massa dignissim, eu pellentesque leo vestibulum. Vestibulum pharetra nibh sit amet nunc vestibulum venenatis. Nunc ut ante elit. Maecenas sit amet purus nec turpis mollis pellentesque. Quisque eget ultricies massa. Sed mauris metus, malesuada ac diam vel, mattis congue nisi. Duis mattis felis nibh, sed sodales felis ullamcorper ac. Integer odio sapien, maximus vitae nulla et, ultrices pharetra leo. Donec massa sem, auctor at erat quis, imperdiet dapibus velit.</p>
		  		</article>
		  		<aside>
		  			<h1>The Second Topic for the Aside</h1>
		  			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet rhoncus dolor id placerat. Vestibulum gravida nunc non massa dignissim, eu pellentesque leo vestibulum.</p>
		  		</aside>
	  		</section>
	  	</section>
	  	<footer>
	  		<p>&copy 2017 Our Company Name</p>
	  	</footer>
  	</div>
  </body>
</html>
