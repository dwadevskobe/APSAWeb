<!DOCTYPE html>

<div class = "center" id = "header" style = "margin-bottom:50px">
  <a class="tablinks" onclick="newTab(event,home)" href="/index.php">Home</a></li>
    <div class = "dropdown">

        <a class = "tablinks" onclick="newTab(event,about)" href="/about.php">About</a></li>
        <div class="dropdown-content">
            <a href="/ourstory.php">Ourstory</a>
         <a href="/ms.php">Mission Statement</a>
            <a href="/faq.php">FAQ</a>
        </div>

    </div>

  <a class = "tablinks" onclick="newTab(event)" href="/cal.php">Calendar</a></li>

  <div class = "dropdown">
    <a class = "tablinks" onclick="newTab(event)" href="/ie.php">Important Events</a></li>
    <div class="dropdown-content">
        <a href="/hsc.php">High School Conference (Fall)</a>
        <a href="/ats.php">Annual Talent Show (Winter)</a>
        <a href="/gb.php">Grad Banquet (Spring)</a>
    </div>
  </div>

  <a class = "tablinks active" onclick="newTab(event)" href="/forum.php">Forums</a></li>
  <a class = "tablinks" onclick="newTab(event)" href="/cu.php">Contact Us</a></li>
</div>



<link rel="stylesheet" href="../styles.css" type="text/css">



<?php
session_start();

include 'connect.php';



if($_SERVER['REQUEST_METHOD'] != 'POST')
{  

    if(   isset($_COOKIE['signedin']) == false)
    {
        echo '<div class = "center" id = "wrapper1" style = "margin-top: 30px; font-size: 22px;">
                <h1>Discussion Forums </h1>
                Sorry, you have to be <a href="/forum/signin.php">signed in</a> to create a topic.
              </div>
                ';
    }

    else{
    //the form hasn't been posted yet, display it
    echo '<form method="post" action="">
        <div class = "center" id = "wrapper1" style = "margin-top: 30px">
            <h1>Discussion Forums </h1>
            <h3>Topic name:</h3>  <input type="text" name="topname" /> <br>
            <h3>Your Post:</h3> <textarea name="post_content" /></textarea> <br><br>
            <input type="submit" value="Add Topic" class = "item"/>
        </div>
     </form>';
    }
}
else
{


    //start the transaction
    $query  = "BEGIN WORK;";
    $result = mysqli_query($connect,$query);

         
    if(!$result)
    {
        echo 'An error occured. Please try again later.';

    }
    else if ( empty($_POST['topname']) )
         header("Location: /forum/create_topic.php" );
    
    else{

        //the form has been posted, so save it
        $sql = "INSERT INTO topics(topic_subject,
                               topic_date,
                               topic_cat,
                               topic_by)
        VALUES( '" . mysqli_real_escape_string($connect, $_POST['topname']) . "',
                NOW(),
                '" . $_SESSION['cat_id'] . "',
                '" . $_SESSION['user_id'] . "' )";



        $result = mysqli_query($connect,$sql);
        if(!$result)
        {
            echo 'Error while inserting data, please try again later.' . mysqli_error($connect);
            $sql = "ROLLBACK;";
            $result = mysqli_query($connect,$sql);
       }
        else
       {
            //the first query worked, now start the second, posts query
            //retrieve the id of the freshly created topic for usage in the posts query
            $topicid = mysqli_insert_id($connect);

            $sql = "INSERT INTO
                            posts(post_content,
                                  post_date,
                                  post_topic,
                                  post_by)
                        VALUES
                            ('" . mysqli_real_escape_string($connect,$_POST['post_content']) . "',
                                  NOW(),
                                  " . $topicid . ",
                                  " . $_SESSION['user_id'] . "
                            )";
                $result = mysqli_query($connect,$sql);
                 
                if(!$result)
                {
                    //something went wrong, display the error
                    echo 'An error occured while inserting your post. Please try again later.' . mysql_error();
                    $sql = "ROLLBACK;";
                    $result = mysqli_query($connect,$sql);
                }
                else
                {
                    $sql = "COMMIT;";
                    $result = mysqli_query($connect,$sql);
                     
                    //after a lot of work, the query succeeded!
                    header("Location: /forum/topic.php?id=" .$topicid );
                   
                }


       }
    }
}
?>
</div>

</html>