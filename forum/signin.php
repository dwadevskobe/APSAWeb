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

<?php
//signin.php
include 'connect.php';
 

// Start the session
session_start();

//first, check if the user is already signed in. If that is the case, there is no need to display this page
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
    echo 'You are already signed in, you can <a href="signout.php">sign out</a> if you want.';
}
else
{
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        /*the form hasn't been posted yet, display it
          note that the action="" will cause the form to post to the same page it is on */
        echo '
           <div class = "center" id = "wrapper1" style = "margin-top: 30px">
              <h3>Sign in</h3>
              <form method="post" action="">
                <h3>
                   Email: <input type="email" name="email" /> <br><br>
                   Password: <input type="password" name="user_pass"> <br>
                </h3>
                <input type="submit" value="Sign in" class="item"/>
              </form>
            </div>';

    }
    else
    {
        /* so, the form has been posted, we'll process the data in three steps:
            1.  Check the data
            2.  Let the user refill the wrong fields (if necessary)
            3.  Varify if the data is correct and return the correct response
        */
        $errors = array(); /* declare the array for later use */
         
        if(!isset($_POST['email']))
        {
            $errors[] = 'The email field must not be empty.';
        }
         
        if(!isset($_POST['user_pass']))
        {
            $errors[] = 'The password field must not be empty.';
        }
         
        if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
        {
            echo ' <div class = "center" id = "wrapper1" style = "margin-top: 30px; font-size:20px;"> 
                    Uh-oh.. a couple of fields are not filled in correctly..';
            echo '<ul>';
            foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
            {
                echo '<li>' . $value . '</li>'; /* this generates a nice error list */
            }
            echo '</ul> </div>';
        }
        else
        {
            //the form has been posted without errors, so save it
            //notice the use of mysql_real_escape_string, keep everything safe!
            //also notice the sha1 function which hashes the password
            $sql = "SELECT 
                        email,
                        display_name,
                        user_level,
                        user_id
                    FROM
                        users
                    WHERE
                        email = '" . mysqli_real_escape_string($connect, $_POST['email']) . "'
                    AND
                        user_pass = '" . sha1($_POST['user_pass']) . "'";
                         
            $result = mysqli_query($connect,$sql);
            if(!$result)
            {
                //something went wrong, display the error
                echo 'Something went wrong while signing in. Please try again later.';
                //echo mysqli_error($connect); //debugging purposes, uncomment when needed
            }
            else
            {
                //the query was successfully executed, there are 2 possibilities
                //1. the query returned data, the user can be signed in
                //2. the query returned an empty result set, the credentials were wrong
                if(mysqli_num_rows($result) == 0)
                {
                    echo '<div class = "center" id = "wrapper1" style = "margin-top: 30px; font-size:20px;"> 
                            You have supplied a wrong email/password combination. Please try again. </div>';
                }
                else
                {
                    //set the $_SESSION['signed_in'] variable to TRUE
                    $_SESSION['signed_in'] = true;

                    //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                    $row = mysqli_fetch_assoc($result);

                        setcookie("name", $row['display_name'],time()+(10 * 365 * 24 * 60 * 60), '/');
                        setcookie("signedin", true ,time()+(10 * 365 * 24 * 60 * 60), '/'); 
                        setcookie("userid", $row['user_id'],time()+(10 * 365 * 24 * 60 * 60), '/'); 
                        setcookie("userlevel", $row['user_level'],time()+(10 * 365 * 24 * 60 * 60), '/');  
                    
                        $_SESSION['user_id']    = $row['user_id'];
                        $_SESSION['display_name']  = $row['display_name'];
                        $_SESSION['user_level'] = $row['user_level'];
                    
                     
                    header('Refresh: 0.1; URL = /forum.php');
                }
            }
        }
    }
}
 
?>