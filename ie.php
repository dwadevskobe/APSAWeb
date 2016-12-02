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

  <a class = "tablinks" onclick="newTab(event)" href="media.php">Media</a></li>
  <a class = "tablinks" onclick="newTab(event)" href="cu.php">Contact Us</a></li>
</div>

<div class ="center">
      <div class = "intro1" style = "margin-top:25px">
        <div class = "color1 shadow" style = "margin:15px; padding:10px">
          <a href="hsc.php"> <h1> High School Conference (Fall)</h1></a>
          <p> Each year, APSA holds our annual High School Conference during fall quarter. This biggie event focuses on the access work that APSA does. APSA's High School Conference wishes to support high school students in their journey towards achieving their goals by providing a fun-filled day for attendees on the UC San Diego campus itself! It is of no costs to high school students. Our High School Conferences are aimed towards providing the adequate resources and tools students need to pursue higher education. Through fun and informative workshops, mentorship, a scholarship opportunity from UCSD APSA, and a tour of the UCSD campus, we hope to help create greater access to higher education for underserved and underrepresented high school students.  </p>
          <a href="ats.php"> <h1> Annual Talent Show (Winter)</h1></a>
          <p> Each year, APSA holds our annual Talent Show during winter quarter. This biggie event focuses on showcasing API talent that is not accurately represented in the media. </p>
          <a href="gb.php"> <h1> Grad Banquet (Spring) </h1></a>
          <p> Each year, APSA holds a grad banquet to honor and celebrate the graduation of our seniors at the end of the school year. </p> 
      </div>
    </div>
</div>

</body>

</html>