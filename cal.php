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

  <a class = "tablinks" onclick="newTab(event)" href="forum.php">Forums</a></li>
  <a class = "tablinks" onclick="newTab(event)" href="cu.php">Contact Us</a></li>
</div>


<script>
    $(document).ready(function() {


    $('#calendar').fullCalendar({
         
      contentHeight: 1000 , 
      eventBackgroundColor: 'red' , 
      events: [
        {
            title  : 'Board Meeting',
            start  : '18:00',
            end : '21:00',
            dow : [1],
            className: 'big'
        },
        {
            title  : 'Disorientation',
            start  : '2016-09-22T18:30:00',
            end : '2016-09-22T21:00:00',
            className: 'big'
        },
        {
            title  : 'Bonfire',
            start  : '2016-09-23T18:00:00',
            end : '2016-09-22T21:00:00',
            className: 'big'
        }
      ]


    });



});

</script>

<div id='calendar'></div>

</body>
</html>