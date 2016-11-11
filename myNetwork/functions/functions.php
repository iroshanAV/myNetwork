<?php

$con = mysqli_connect("localhost","root","","socialn") or die("Connection was not established");



//function used for getting the Topics
function getTopics(){
global $con;
 $get_topics = "select * from topics";
             $run_topics = mysqli_query($con,$get_topics);

             while($row=mysqli_fetch_array($run_topics)){
             	$topic_id = $row['topic_id'];
             	$topic_title = $row['topic_title'];

             	echo "<option class='form-control' value='$topic_id'>$topic_title</option>";
             }

         }


//function for inserting posts
 function insertPost(){
 	if(isset($_POST['sub'])){ 
 		global $con;
 		global $user_id;
 		$title = addcslashes($_POST['title']);
 		$content = addcslashes($_POST['content']);
        $topic = addcslashes($_POST['topic']);

        $insert= "insert into posts(user_id,topic_id,post_title,post_content,post_date) values('$user_id','$topic','$title','$content',NOW())";

        $run = mysqli_query($con,$insert);

              if($run){
              	echo "<h3>Posted to timeline</h3>";

              	$update = "update users set posts='yes' where user_id='$user_id'";
              
              } 
 	}
 }


 //function for displaying posts
 function get_posts(){
 	global $con;
 	$per_page = 5;
 	
 	if(isset($_GET['page'])){
 		$page = $_GET['page'];
 	}else{
 		$page = 1;
 	}
 	$start_from = ($page-1)* $per_page;
 	$get_posts = "select * from posts order by 1 desc limit $start_from, $per_page";
 	$run_posts = mysqli_query($con,$get_posts);

 	while($row_posts = mysqli_fetch_array($run_posts)){
       $post_id = $row_posts['post_id'];
       $user_id = $row_posts['user_id'];
       $post_title = $row_posts['post_title'];
       $content = $row_posts['post_content'];
       $post_date = $row_posts['post_date'];

       //getting the user who has posted the thread
       $user = "select * from users where user_id='$user_id' and posts='yes'";

       $run_user = mysqli_query($con,$user);
       $row_user = mysqli_fetch_array($run_user);
       $user_name = $row_user['user_name'];
       $user_image= $row_user['user_image'];


       //now displaying all at once
       echo "<div id='posts'>
       <p><img src='user/userimages/$user_image' width='50' height='50'></p>
       <h3><a href='user_profile.php?user_id=$user_id'>$user_name</a></h3>
       <h3>$post_title</h3>
       <p>$post_date</p>
       <p>$content</p>
       <a href='single.php?post_id=$post_id' style='float:right;'><button class='form-control'>See replies or reply to this</button></a>
       </div><hr>
       ";
 	}
 	include("pagination.php");

 }







function single_post(){
  if(isset($_GET['post_id'])){
    global $con;
    $get_id = $_GET['post_id']; 

    $get_posts = "select * from posts where post_id='$get_id'";
  $run_posts = mysqli_query($con,$get_posts);

       $row_posts = mysqli_fetch_array($run_posts);
       $post_id = $row_posts['post_id'];
       $user_id = $row_posts['user_id'];
       $post_title = $row_posts['post_title'];
       $content = $row_posts['post_content'];
       $post_date = $row_posts['post_date'];

       //getting the user who has posted the thread
       $user = "select * from users where user_id='$user_id' and posts='yes'";

       $run_user = mysqli_query($con,$user);
       $row_user = mysqli_fetch_array($run_user);
       $user_name = $row_user['user_name'];
       $user_image= $row_user['user_image'];


       //now displaying all at once
       echo "<div id='posts'>
       <p><img src='user/userimages/$user_image' width='50' height='50'></p>
       <h3><a href='user_profile.php?user_id=$user_id'>$user_name</a></h3>
       <h3>$post_title</h3>
       <p>$post_date</p>
       <p>$content</p>     
       </div><hr>";

       include("comments.php");


       echo "
       <form action='' method='post'>
       <textarea class='form-control' cols='50' rows='5' name='comment'></textarea>
       <input type='submit' class='form-control' value='Reply' name='reply'>
       </form>
       ";

  if(isset($_POST['reply'])){
    $comment = $_POST['comment'];
    $insert = "insert into comments(post_id,user_id,comment,date) values('$post_id','$user_id','$comment',NOW())";

    $run = mysqli_query($con,$insert);
    echo "Reply was added";
  }
  }
}



 
?>