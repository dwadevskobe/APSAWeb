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
//create_cat.php
session_start();

include 'connect.php';

// check for admin rights
if ( isset($_COOKIE['userlevel']) == false ){
   echo '<div class = "center" id = "wrapper1" style = "margin-top:30px; font-size:22px;">
                <h1>Discussion Forums </h1>
                Sorry, you have to be an admin to create a category.
              </div>
                ';
}

else 
if($_SERVER['REQUEST_METHOD'] != 'POST')
{  

    if(   isset($_COOKIE['signedin']) == false)
    {
        echo '<div class = "center" id = "wrapper1" style = "margin-top:30px; font-size:22px;">
                <h1>Discussion Forums </h1>
                Sorry, you have to be <a href="/forum/signin.php">signed in</a> to create a category.
              </div>
                ';
    }

    else{
    //the form hasn't been posted yet, display it
    echo '<form method="post" action="">
        <div class = "center" id = "wrapper1" style = "margin-top: 30px">
            <h1>Discussion Forums </h1>
            <h3>Category name:</h3>  <input type="text" name="catname" /> <br>
            <h3>Category description:</h3><textarea name="catdescription" /></textarea> <br>
            <input type="submit" value="Add category" class = "item"/>
        </div>
     </form>';
    }
}
else
{
    //the form has been posted, so save it
    $sql = "INSERT INTO categories(cat_name, cat_description)
       VALUES('" . mysqli_real_escape_string($connect, $_POST['catname']) . "',
             '" . mysqli_real_escape_string($connect, $_POST['catdescription']) . "')";
    $result = mysqli_query($connect,$sql);
    if(!$result)
    {
        //something went wrong, display the error
        echo 'Error' . mysqli_error();
    }
    else
    {
       header("Location: /forum.php" );
    }
}
?>
</div>

</html>