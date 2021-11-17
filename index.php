<?php 

include("config.php");

error_reporting(0);  //for not showing any error

if(isset($_POST['submit'])){ //check for post method
    $n = $_POST['name'];//get name from form
    $e = $_POST['email'];//get email from form
    $c = $_POST['comment'];//get comment from form

    $sql = "INSERT INTO comments (name , email , comments) VALUES ('$n' , '$e' , '$c')";

    $result = mysqli_query($conn , $sql);

    if($result){

        echo "<script>alert('comment added successfully')</script>";
        
    }
    else
    {
        echo "<script>alert('comment does not add')</script>";
        
    }
}

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        
        <link rel="stylesheet" href="style.css">

        <title>Comment System in php</title>
    </head>
    <body>
        <div class="wrapper">
            <form action="" method="post" class="form">
           <div class="row">
            <div class="input-group">
                <lable for="name">Name:</lable>
                <input type="text" name="name" id="name" placeholder="Enter your name" required>
            </div>
            <div class="input-group">
                <lable for="email">Email:</lable>
                <input type="email" name="email" id="email" placeholder="Enter your email" required>
            </div>
           </div>
                <div class="input-group textarea">
                    <lable for="comment">Comments:</lable>
                    <textarea  name="comment" id="comment" placeholder="Write your comment here" required></textarea>
                </div>
                <br><br><br><br><br><br><br>
                <div class="input-group">
                    <button name="submit" class="btn">Post Comment</button>
                </div>
            </form>
            
            <div class="prev-comments">
                <?php 
                
                $sql = "SELECT * FROM comments";

                $result = mysqli_query($conn , $sql);

               

                if( mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                
                ?>
               
                <div class="single-item">
                    <h3><?php echo $row['name'];?></h3>
                    <a href="<?php echo $row['email'];?>"><?php echo $row['email'];?></a>
                    <p><?php echo $row['comments'];?></p>
                </div>
                <?php
                    }
                }

                ?>
            </div>
        </div>
    </body>
</html>