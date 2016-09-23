<?php

session_start();

include 'connect.php';

 
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //someone is calling the file directly, which we don't want
    echo 'This file cannot be called directly.';
}
else
{
    //check for sign in status
    if( !isset($_COOKIE['signedin']) )
    {
        echo 'You must be signed in to post a reply.';
    }
    else if ( empty($_POST['reply-content'] )){
        header("Location: /forum/topic.php?id=" . $_SESSION['top_id'] );
    }
    else
    {
        //a real user posted a real reply
        $sql = "INSERT INTO 
                    posts(post_content,
                          post_date,
                          post_topic,
                          post_by) 
                VALUES ('" . $_POST['reply-content'] . "',
                        NOW(),
                        '" . $_SESSION['top_id'] . "',
                        '" . $_COOKIE['userid'] . "')";
                         
        $result = mysqli_query($connect, $sql);
                         
        if(!$result)
        {
            echo 'Your reply has not been saved, please try again later.' . mysqli_error($connect);
        }
        else
        {
            header("Location: /forum/topic.php?id=" . $_SESSION['top_id'] );
        }
    }
}
 
