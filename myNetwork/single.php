<?php
session_start();
include("includes/connection.php");
include("functions/functions.php");

if(!isset($_SESSION['user_email'])){
   header("location: index.php");
}else{
?>
<html>
<head>
	<title>myNetwork</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript"  src="js/boststrap.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/home_style.css">
</head>
<body>
   

    <nav class="navbar navbar-default">
  <div class="container-fluid">
   
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="images/users.png" class="img-rounded" alt="Cinque Terre" width="35" height="35">
</a>
    </div>   
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="#">myNetwork <span class="sr-only">(current)</span></a></li>
         <li ><a href="home.php">Home <span class="sr-only">(current)</span></a></li>
         <li ><a href="members.php">Members <span class="sr-only">(current)</span></a></li>
         <?php
             $get_topics = "select * from topics";
             $run_topics = mysqli_query($con,$get_topics);

             while($row=mysqli_fetch_array($run_topics)){
             	$topic_id = $row['topic_id'];
             	$topic_title = $row['topic_title'];

             	echo " <li ><a href='home.php?topic=$topic_id'>$topic_title<span class='sr-only'>(current)</span></a></li>";
             }
         ?>        
      </ul>
      <form id="signin" class="navbar-form navbar-right" role="form" method="POST" action="results.php">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                            <input id="email" type="text" class="form-control" name="email" value="" placeholder="Search" >                                        
                        </div>
                        <button type="submit" class="btn btn-primary" name="search">Search</button>
                   </form>     
    </div>
  </div>
</nav>
	<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
             <?php
             $user = $_SESSION['user_email'];
             $get_user="select * from users where user_email='$user'";
             $run_user= mysqli_query($con,$get_user);
             $row = mysqli_fetch_array($run_user);

             $user_id= $row['user_id'];
             $user_name = $row['user_name'];
             $user_image = $row['user_image'];
             $user_country = $row['user_country'];
             $register_date = $row['register_date'];
             $last_login = $row['user_id'];
             ?>
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<?php echo "<img src='user/userimages/$user_image' class='img-responsive' >"  ?>
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->

				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
					Hello	<?php echo $user_name = $row['user_name'];  ?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
					    <li>
							<a href="#">
							<i class="glyphicon glyphicon-barcode"></i>
							User ID: <?php echo $user_id = $row['user_id']; ?> </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Country: <?php echo $user_country = $row['user_country']; ?> </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-calendar"></i>
							Member Since: <?php echo $register_date = $row['register_date']; ?> </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-eye-open"></i>
							Last Login: <?php echo $last_login = $row['last_login']; ?> </a>
						</li>
						<li>
							<a href="my_messages.php">
							<i class="glyphicon glyphicon-envelope"></i>
							Messages (3) </a>
						</li>
						<li>
							<a href="my_posts.php">
							<i class="glyphicon glyphicon-comment"></i>
							My Posts (2) </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>

					</ul>
					<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm"><a href="edit_profile.php">  Edit My Account</a></button>
					<button type="button" class="btn btn-danger btn-sm"><a href="logout.php"> Log Out </a></button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
			  <div class="well"> 
                                   
                              </div>
                               <div class="posts">
            
            	<?php single_post(); ?>
            </div>
            </div>

		</div>
	</div>
</div>
<center>
<strong>Powered by myNetwork</strong>
</center>
<br>
<br>

</body>
</html>

<?php } ?>
