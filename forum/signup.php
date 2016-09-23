 <link rel="stylesheet" href="/styles.css" type="text/css">

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

</html>

<div class = "content">

<?php

include 'connect.php';

 
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    /*the form hasn't been posted yet, display it
      note that the action="" will cause the form to post to the same page it is on */
    echo '<form method="post" action="">
    
     <div class = "center" id = "wrapper1" style = "margin-top: 30px">
        <h3>Forums Account Sign up :)</h3>
        <h3> Email <input type="email" name="email"  /> <br><br>
        Password: <input type="password" name="user_pass"> <br><br>
        Password again: <input type="password" name="user_pass_check"> <br><br>
        Display Name (Real Name): <input type="text" name="display_name"> <br><br> </h3>
        <input type="submit" value="Submit" class="item" />
     </div>

     </form>';

}
else
{
    /* so, the form has been posted, we'll process the data in three steps:
        1.  Check the data
        2.  Let the user refill the wrong fields (if necessary)
        3.  Save the data 
    */
    $errors = array(); /* declare the array for later use */
     
    if(empty($_POST['email']))
    {
    
        $errors[] = 'The Email field must not be empty.';
    }
     
     
    if(!empty($_POST['user_pass']))
    {
        if($_POST['user_pass'] != $_POST['user_pass_check'])
        {
            $errors[] = 'The two passwords did not match.';
        }
    }
    else
    {
        $errors[] = 'The password field cannot be empty.';
    }

    if(empty($_POST['display_name']))
    {
    
        $errors[] = 'The Display name field must not be empty.';
    }
     

    if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
    {
        echo ' <div class = "center" id = "wrapper1" style = "margin-top: 30px; font-size:20px;">
                 Uh-oh.. a couple of fields are not filled in correctly..  ';
        echo '<ul>';
        foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
        {
            echo '<li>' . $value . '</li>'; /* this generates a nice error list */
        }
        echo '</ul> </div>';
    }
    else
    {
        //the form has been posted without, so save it
        //notice the use of mysql_real_escape_string, keep everything safe!
        //also notice the sha1 function which hashes the password
        $sql = "INSERT INTO
                    users(email, user_pass, display_name ,user_date, user_level)
                VALUES('" . mysqli_real_escape_string($connect, $_POST['email']) . "',
                       '" . sha1($_POST['user_pass']) . "',
                       '" . mysqli_real_escape_string($connect, $_POST['display_name']) . "',
                        NOW(),
                        0)";
                         
        $result = mysqli_query($connect, $sql);
        if(!$result)
        {
            //something went wrong, display the error
            //echo 'Something went wrong while registering. Please try again later.';
            //echo mysqli_error($connect); //debugging purposes, uncomment when needed
        }
        else
        {
            echo '<div class="center"><h3> Successfully registered. You can now <a href="signin.php">sign in</a> and start posting! :-) </h3></div>';
        }
    }
}

?>