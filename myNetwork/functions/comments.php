   <?php

    $get_id = $_GET['post_id']; 

    $get_com = "select * from comments where post_id='$get_id' order by 1 desc";
    $run_com = mysqli_query($con,$get_com);


    while($row=mysqli_fetch_array($run_com)){
          $com = $row['comment'];
          $com_name = $row['user_id'];
          $date = $row['date'];

          echo "<div id='comments'>
          <h3>$com_name</h3><i>said</i> on $date
          <p>$com</p>
          </div>";

          echo "<script>window.opoen('single.php?post_id=$get_id','_self')</script>";
    }
    ?>