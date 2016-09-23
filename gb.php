<!DOCTYPE html>

<?php include("tabs.php");?>


<div class = "center" id = "header">
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
    <a class = "tablinks active" onclick="newTab(event)" href="ie.php">Important Events</a></li>
    <div class="dropdown-content">
      <a href="hsc.php">High School Conference (Fall)</a>
      <a href="ats.php">Annual Talent Show (Winter)</a>
      <a href="gb.php">Grad Banquet (Spring)</a>
    </div>
  </div>

  <a class = "tablinks" onclick="newTab(event)" href="forum.php">Forums</a></li>
  <a class = "tablinks" onclick="newTab(event)" href="cu.php">Contact Us</a></li>
</div>

</body>

</html>