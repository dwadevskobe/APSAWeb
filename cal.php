<!DOCTYPE html>

<head>

<link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
<link rel="stylesheet" type="text/css" href="styles.css?version=1" />
<script src='fullcalendar/lib/jquery.min.js'></script>
<script src='fullcalendar/lib/moment.min.js'></script>
<script src='fullcalendar/fullcalendar.js'></script>
</head>

<body>



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

  <a class = "tablinks active" onclick="newTab(event)" href="cal.php">Calendar</a></li>

  <div class = "dropdown">
    <a class = "tablinks" onclick="newTab(event)" href="ie.php">Important Events</a></li>
    <div class="dropdown-content">
      <a href="hsc.php">High School Conference (Fall)</a>
      <a href="ats.php">Annual Talent Show (Winter)</a>
      <a href="gb.php">Grad Banquet (Spring)</a>
    </div>
  </div>

  <a class = "tablinks" onclick="newTab(event)" href="media.php">Media</a></li>
  <a class = "tablinks" onclick="newTab(event)" href="cu.php">Contact Us</a></li>
</div>

<p>  <br> </p>

<iframe src="https://calendar.google.com/calendar/embed?src=ucsdapsa%40gmail.com&ctz=America/Los_Angeles" style="border: 0" width="100%" height="650" frameborder="0" scrolling="no"></iframe>

</body>
</html>