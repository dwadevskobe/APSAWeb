
<link rel="stylesheet" href="../styles.css" type="text/css">

<!DOCTYPE html>
<body>

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

<div id="wrapper">
    <h1>Discussion Forums</h1>
    <div id="menu" style = "font-weight:bold; font-size:18px;">
        

        <div id="userbar" style ="margin-top:-10px"> 
        <?php

            // Start the session
            session_start();

           if( isset($_COOKIE['name']))
            {
                echo ' Hello ' . $_COOKIE['name'] . '. Not you? <a class="item"  href="/forum/signout.php">Sign out</a>';
            }
            else
            {
                echo '<a class="item" href = "/forum/signin.php" style="padding:7px;">Sign In</a> Or <a class = "item" href = "/forum/signup.php" style="padding:7px;"> Create an Account </a>';
            }
        ?>
    </div>

    </div>

<div id="content">


<?php

include 'connect.php';


$topicid = mysqli_real_escape_string($connect, $_GET['id']);
$_SESSION['top_id']    = $topicid;

$sql = "SELECT
      topic_id,
      topic_subject
    FROM
        topics
    WHERE
        topics.topic_id = '".$topicid."'
    ";

 
$result = mysqli_query($connect,$sql);
 
if(!$result)
{
    echo 'Something went wrong. Please try again later.' . mysqli_error($connect);
}
else{

    $numcount = mysqli_num_rows($result);
    if( $numcount == 0)
    {
        echo 'This topic does not exist.';
    }
    else
    {
        //display category data
        while($row = mysqli_fetch_assoc($result))
        {
            echo ' <div class = "center"><h2>' . $row['topic_subject'] . '</h2></div>';
        }

        $sql = "SELECT
             posts.post_topic,
             posts.post_content,
             posts.post_date,
             posts.post_by,
             posts.post_id,
             users.user_id,
             users.display_name
            FROM
                posts
            LEFT JOIN
                users
            ON
                posts.post_by = users.user_id
            WHERE
                posts.post_topic = '" . mysqli_real_escape_string($connect, $_GET['id']) ."'
        ";


         $result = mysqli_query($connect,$sql);
         
        if(!$result)
        {
            echo 'The posts could not be displayed, please try again later.' . mysqli_error($connect);
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo ' <div class = "center"> There are no posts in this topic yet. </div>';
            }
            else
            {
                //prepare the table
                echo '<table border="1">
                      <tr>
                        <th>Reply</th>
                        <th>By</th>
                      </tr>'; 
                     
                while($row = mysqli_fetch_assoc($result))
                {               
                    echo '<tr>';
                        echo '<td class="leftpart" style = "padding:25px;">';
                            echo '' . $row['post_content'];
                        echo '</td>';
                        echo '<td class="rightpart">';
                            echo ''. $row['display_name'] . ' at <br>' . date('m-d-Y', strtotime($row['post_date']));
                          /*  if ( $row['display_name'] == $_COOKIE['name']){ 

                                echo'<form method="post" action = "topic.php?id='. $topicid .' "style = "float:right">
                                    <input type = "submit"  name = '. $row['post_id'] .' value = "delete">
                                </form>';
                            }  */

                           

                        
                        echo '</td>';
                    echo '</tr>';
                }
                echo'</table>';

             /*   while($row = mysqli_fetch_assoc($result)) {
                     if (isset( $_POST[ $row['post_id'] ])){
                                $sql = "DELETE FROM posts WHERE post_id = '". $row['post_id'] ."'
                                ";
                                mysqli_query($connect,$sql);

                     }  
                } */

            }
                echo ' <div class = "center" style = "padding:10px">
                    <form method="post" action="reply.php">
                    <textarea name="reply-content"></textarea> <br><br>
                    <input type="submit" class = "item" value="Submit reply" />
                    </form>  </div>
                ';
            
        }
    }
}

?>


</div>

</div>
</body>
</html>
                
                