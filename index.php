<!DOCTYPE html>


<title>
UCSD APSA
</title>

<?php include("tabs.php");?>

<div class = "mid">

<div class = "center" id = "header">
  <a class="tablinks active" onclick="newTab(event,home)" href="index.php">Home</a></li>
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

  <a class = "tablinks" onclick="newTab(event)" href="forum.php">Forums</a></li>
  <a class = "tablinks" onclick="newTab(event)" href="cu.php">Contact Us</a></li>
</div>

	<div class = "center">
		<img src="http://fontmeme.com/embed.php?text=University%20of%20California%2C%20San%20Diego%202016-2017&name=Redressed.ttf&size=35&style_color=15155E" style = "margin-top:40px; width:65%;">
	</div>


	<div class = "center" style="margin-top:0px;">
		<img src="images\apsa.png" alt="Logo"  >
	</div>
	<div class = "center" style="margin-top:20px;">
		<p class = "oldlink"> Link to our old website:  <a href = http://ucsdapsa.weebly.com/ > http://ucsdapsa.weebly.com/</a> </p>
		<div class="slideshow-container">
			<img class = "mySlides fade" src="images\apsa1.jpg" alt="Logo1" style="width:81%">
			<img class = "mySlides fade" src="images\apsa.jpg" alt="Logo1" style="width:81%">
			<img class = "mySlides fade" src="images\meow.jpg" alt="Logo1" style="width:81%">
    		<a class="prev" onclick="plusDivs(-1)">&#10094;</a>
  			<a class="next" onclick="plusDivs(1)">&#10095;</a>
		</div>
	</div> 

	<script>
		var slideIndex = 0;
		autoShow();

		function plusDivs(n) {
  		showDivs(slideIndex += n);
		}

		function showDivs(n) {
 		 	var i;
  			var x = document.getElementsByClassName("mySlides");
  			if (n > x.length) {slideIndex = 1}
  			if (n < 1) {slideIndex = x.length}
  			for (i = 0; i < x.length; i++) {
     			x[i].style.display = "none";
  			}
 		 	x[slideIndex-1].style.display = "inline";
		}

		function autoShow() {
    		var i;
    		var x = document.getElementsByClassName("mySlides");
    		for (i = 0; i < x.length; i++) {
      			x[i].style.display = "none"; 
    		}
    		slideIndex++;
    		if (slideIndex > x.length) {slideIndex = 1} 
    			x[slideIndex-1].style.display = "inline"; 
   			setTimeout(autoShow, 5000); 
}

	</script>

		<div class ="center">
			<div class = "intro">
				<div class = "color1 shadow" style = "margin:45px; padding:10px">
					<img src="http://fontmeme.com/embed.php?text=Welcome!&name=JennaSue.ttf&size=70&style_color=15155E" style="width:15%""><p> UC San Diego's Asian Pacific Islander Student Allianace was founded in 1970 as Asian American Student Alliance (AASA). Our organization represent the four pillars of cultural, academic, political, and social. We focus on issues related to the API community, but we're also here to have fun! Come check us out at any of our events, anyone is welcome to come! </p>
				</div>
			</div>
		</div>




	<div class = "center" >
		<div class = "intro">
			<div class = "color1 shadow" style = "margin:45px; padding:10px">
				<img src="http://fontmeme.com/embed.php?text=Announcements%3A%0A&name=Redressed.ttf&size=50&style_color=15155E" style="width:35%" >

                                <ul id = "facebook">
                                     <li class = "fb1"> &nbsp
                                     	<a href="https://www.facebook.com/groups/ucsdapsa/"><h3 class = "signup">Follow our Group</h3></a> &nbsp
                                     	<a href="https://www.facebook.com/apsaucsd/?fref=ts"><h3 class ="signup">Follow our Page</h3></a>
                                     </li>
                                     <li class = "snap1"> <h3 class = "signup"> &nbsp Follow us on Snapchat for live updates : ucsdapsa  </h3></li>
                                </ul>

                                <p class = "events"> Looking for a meaningful volunteering opportunity and create change? And maybe FREE DINNER? APSA LEAP is working with Reality Changers, and we're looking for volunteer mentors who want to work with underprivileged students/youth in regards to educational access and provide them with academic and personal orientation! It's a really great opportunity for anyone who's seeking for a volunteer hours or building their resume! Training will be provided, and we will have transportation as well for those who need them!  <br><br> 
                                <a href = https://docs.google.com/forms/d/e/1FAIpQLSdGDU0A8eTvcayac7fgjofB2IUz2ZQ4HR6_dAHlgxKQ2suKYQ/viewform?c=0&w=1> Signup Here</a> </p>
			</div>
		</div>
	</div>

	<div class = "center">
		<div class = "block">
			<div class = "color1 shadow" style = "margin:15px; padding:10px">
				<img src="http://fontmeme.com/embed.php?text=Upcoming%20Events%3A&name=Redressed.ttf&size=40&style_color=15155E" style="width:60%">


				 <h3> GBM #1  API IN MEDIA</h3>
				 <p class = "events"> Date: 1/17/17 Tuesday, 6:30 PM <br>
				 Location: CCC Communidad  </p>

				 Our topic will be API in media! Come learn what APSA is about! 

				 <h3> Karaoke Night @ Karaoke 101 </h3>
				 <p class = "events"> Date: 1/19/17 Thursday, 6:00 PM  <br>
				 Location: Meet in front of Croutons at Student Services Center for Rides </p>

				 Sing Your Hearts out !!

				 <h3> Food and Boba Social </h3>
				 <p class = "events"> Date: 1/20/17 Friday, 11:00AM-12PM  <br>
				 Location: Meet in front of Croutons at Student Services Center for Rides </p>

				 Come join us and eat good food at Zion Market!

				 <h3> APSA GOES TO APAAC </h3>
				 <p class = "events"> Date: 1/21/17 Saturday 8:00AM-6PM  <br>
				 Location: Meet in front of Croutons at Student Services Center for Rides </p>

				 More Info On the FB Page: <a href = "https://www.facebook.com/events/1521561687883975/"> Link </a>

				 <h3> APSA Listen to Silence Conference </h3>
				 <p class = "events"> Date: 1/27/17 - 1/29/17 <br>
				 Location : Stanford University </p>

				 More details coming soon!!
				 


			</div>
		</div>
		<div class = "block">
			<div class = "color1 shadow" style = "margin:15px; padding:15px">
				<img src="http://fontmeme.com/embed.php?text=Ongoing%20Events%3A&name=Redressed.ttf&size=40&style_color=15155E" style="width:60%">
				<h3> GENERAL BODY MEETINGS (GBMs)</h3>
				<p class = "events"> Date: Every even week Tuesdays (Week 2, 4, 6, 8, 10) <br> 
   					 Time: 6:30 - 8:00 PM <br> 
   					 Location: CCC Communidad </p>
   				 	
   				 	Come out to our fun GBMs with interesting topics and activities! Hang out and meet new awesome people!  

   				<h3> Talent Show Planning Meetings</h3>
				<p class = "events"> Date: Every Wednesday <br> 
   					 Time: 6:30 - 8:00 PM <br> 
   					 Location: Cross Culture Center Artspace </p>
   				 	
   				 	Make sure you come out if you want to: <br>
					---get involved in a meaningful experience <br>
					---make new memories   <br>
					---gain leadership (something to put on your resume aye)  <br>
					---hang out with some cool people  


   			    <h3> APSA LEAP Meetings</h3>
				<p class = "events"> Date: Every odd week Tuesdays (Week 1, 3, 5, 7, 9) <br> 
   					 Time: 6:30 - 8:00 PM <br>
   					 Location: Cross Culture Center </p>
   				 	
   				 	APSA LEAP will also hold biweekly meetings in which you can involve with educational access work for high school students!
			</div>
		</div>
	</div>
</div>

</div>


</body>
</html>					