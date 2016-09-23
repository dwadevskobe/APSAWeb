<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="A short description." />
    <meta name="keywords" content="put, keywords, here" />
    <title>PHP-MySQL forum</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>

<?php include("tabs.php");?>



<div class = "center" id = "header" style = "margin-bottom:50px">
  <a class="tablinks" onclick="newTab(event,home)" href="index.php">Home</a></li>
    <div class = "dropdown">

      <a class = "tablinks" onclick="newTab(event,about)" href="about.php">About</a></li>
      <div class="dropdown-content">
        <a href="ourstory.php">Ourstory</a>
       <a href="ms.php">Mission Statement</a>
        <a href="faq.php">FAQ</a>
      </div>

    </div>

  <a class = "tablinks" onclick="newTab(event)" href="cal.php">Calendar</a></li>

  <div class = "dropdown">
    <a class = "tablinks" onclick="newTab(event)" href="ie.php">Important Events</a></li>
    <div class="dropdown-content">
      <a href="hsc.php">High School Conference (Fall)</a>
      <a href="ats.php">Annual Talent Show (Winter)</a>
      <a href="gb.php">Grad Banquet (Spring)</a>
    </div>
  </div>

  <a class = "tablinks active" onclick="newTab(event)" href="forum.php">Forums</a></li>
  <a class = "tablinks" onclick="newTab(event)" href="cu.php">Contact Us</a></li>
</div>

<div id="wrapper">
    <h1>Discussion Forums</h1>
    <div id="menu" style = "font-weight:bold; font-size:18px;">
        
        <a class="item" href="/forum/create_cat.php">Create a category</a>

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
    <div id = "content" class ="big" > 

    <?php

      include 'connect.php';

      $sql = "SELECT cat_id, cat_name, cat_description
            FROM categories";

      $result = mysqli_query($connect,$sql);
 
      echo mysqli_error($connect);

      if(!$result)
      {
        echo 'The categories could not be displayed, please try again later.';
      }
      else
      {
        if(mysqli_num_rows($result) == 0)
      {
        echo '<div class = "center">No categories defined yet.</div>';
      }
      else
      {
        //prepare the table
        echo '<table border="1">
              <tr>
                <th>Category</th>
                <th>Last topic</th>
              </tr>'; 
             
        while($row = mysqli_fetch_assoc($result))
        {               
            $catid = $row['cat_id'];
            $sql1 = "SELECT  
                    topics.topic_id,
                    topics.topic_subject,
                    topics.topic_date,
                    topics.topic_cat
                FROM
                    topics
                WHERE
                    topic_cat = '".$catid."'
                ";


              $result1 = mysqli_query($connect,$sql1);
              while ( $temp = mysqli_fetch_assoc($result1) ){
                 $row1 = $temp;
              }

              if(!$result1)
              {
                echo 'The categories could not be displayed, please try again later.' . mysqli_error($connect);;
               }          


            echo '<tr>';
                echo '<td class="leftpart">';
                    echo '<h3><a href="/forum/category.php?id=' . $row['cat_id'] . ' ">' . $row['cat_name'] . '</a></h3>' . $row['cat_description'];
                echo '</td>';
                echo '<td class="rightpart">';
                            if(mysqli_num_rows($result1) == 0)
                              echo 'There are currently no topics in this category';
                            else
                              echo '<a href="/forum/topic.php?id= '.$row1['topic_id'].'" > '. $row1['topic_subject'] .' </a> &nbsp on &nbsp  '. date('m-d-Y', strtotime($row1['topic_date'])) .'  ';
                echo '</td>';
            echo '</tr>';
        }
        echo'</table>';
      }
  }
  ?>

</div>

</div>


</body>

</html>