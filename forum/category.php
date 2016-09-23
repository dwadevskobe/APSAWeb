
<link rel="stylesheet" href="../styles.css" type="text/css">

<div class = "center" style = "margin-bottom:50px" id = "header">
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
        
        <a class="item" href="/forum/create_topic.php">Create a topic</a>  

        <div id="userbar"> 
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

$catid = mysqli_real_escape_string($connect, $_GET['id']);

$_SESSION['cat_id']    = $catid;

$sql = "SELECT
            cat_id,
            cat_name,
            cat_description
        FROM
            categories
        WHERE
            cat_id =   '".$catid."'  
         " ;

 
$result = mysqli_query($connect,$sql);
 
if(!$result)
{
    echo 'The category could not be displayed, please try again later.' . mysqli_error($connect);
}
else
{
	$numcount = mysqli_num_rows($result);
    if( $numcount == 0)
    {
        echo 'This category does not exist.';
    }
    else
    {
        //display category data
        while($row = mysqli_fetch_assoc($result))
        {
            echo ' <div class = "center"><h2>Topics in ' . $row['cat_name'] . ' category</h2></div>';
        }
        $sql = "SELECT  
                    topics.topic_id,
                    topics.topic_subject,
                    topics.topic_date,
                    topics.topic_cat,
                    topics.topic_by,
                    users.display_name,
                    users.user_id
                FROM
                    topics
                LEFT JOIN users
                ON 
                	topics.topic_by = users.user_id
                WHERE
                    topic_cat = '".$catid."'
                ";
         
        $result = mysqli_query($connect,$sql);

         
        if(!$result)
        {
            echo 'The topics could not be displayed, please try again later.';
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo ' <div class = "center"> There are no topics in this category yet. </div>';
            }
            else
            {
                //prepare the table
                echo '<table border="1">
                      <tr class ="big">
                        <th>Topic</th>
                        <th>Created By</th>
                      </tr>'; 
                     
                while($row = mysqli_fetch_assoc($result))
                {               
                    echo '<tr>';
                        echo '<td class="leftpart">';
                            echo '<h3><a href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><h3>';
                        echo '</td>';
                        echo '<td class="rightpart">';
                            echo ''. $row['display_name'] . ' at <br>' . date('m-d-Y', strtotime($row['topic_date']));
                        echo '</td>';
                    echo '</tr>';
                }
                echo'</table>';
            }
        }
    }
}

?>
</div>
</div>


