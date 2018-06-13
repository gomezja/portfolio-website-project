<!DOCTYPE html>
<html>
	<title>
		Team 09, Data Mart
	</title>	

	<style>
		body {
			font-family: Arial, Helvetica, sans-serif;
		}
		
		ul.menu{
			display:table;
			table-layout:fixed;
			list-style-type:none;
			
			background-color:rgb(163,194,194);
			
			width:auto;
			margin:0;
			padding:0;
			
			   border-style:solid;
			border-color:black;
			border-width:2px 0px 2px;
		}
		
		ul.menu li{
			float:left;
			width:auto;
		}
		
		li a{
			display:table-cell;
			text-decoration:none;
			
			color:white;
			
			width:auto;
			padding:10px 25px;
		}
		
		li a:hover{
			background-color:rgb(102,153,153);
			text-decoration:underline;
		}
		
		ul.self {
			width: auto;
			display: table;
			table-layout: fixed;
			margin:0;
			padding:0
		}
		
		ul.self li {
			display: table-cell;
			width: auto;
			float:left;
			padding:10px 25px;
		}
		
		div.col{
			min-height:200px;
			width:400px;
			padding:10px;
			overflow:hidden;
		}
		
		img {
			display:block;
			margin-left: auto;
			margin-right: auto;
		}
		
		h3 {
			text-align: center;
		}
	</style>

	<body>
		<center>
			<ul class="menu">
				<li><a href="http://athena.ecs.csus.edu/~mei/177/csc177.html">CSc 177</a></li>
				<li><a href=index.html>Home</a></li>
				<li><a href=ResearchAndProposal.pdf>Research Paper & Proposal</a></li>
				<li><a href=ProgressReport.pdf>Progress Report</a></li>
				<li><a href=ProjectPresentation.pdf>Project Oral Presentation</a></li>
				<li><a href=FinalProjectReport.pdf>Final Project Report</a></li>
				<li><a href=datamart.php>Data Mart</a></li>
			</ul>
			
			<h1>Data Mart</h1>
			<hr width=1150px>
		</center>
		<center>
		<ul class="self">
			<li>
		<div class="col">
			<p style="font-size:18px">
				<b>Data Mart Description:</b> Our database contains 30,000 customer records from the country of Taiwan. 
									   Data included in this database contains customer information such as age, 
									   gender, and education, their payment history over a 
									   six month period, amount owed, and their default status for the seventh month.  
				<br>
				<br>
				<b>Instructions:</b> Select the customer's information from the drop down menus and press "Submit"
									 when finished.
			</p>
		</div>
		</li>

		<ul class="self">
			<li>
		<div class="col">
			<center>
			<p style="font-size:18px;"><b>Customer Info</b></p>
			</center>
			<form action="results.php" method="get">
					<label style="padding-right:92px;">Highest Education Level:</label>
					<select name="education" style="width:125px;">
						<option value="all">All</option>
						<option value="High School">High School</option>
						<option value="University">University</option>        
						<option value="Graduate School">Graduate School</option>    
						<option value="Others">Other</option>    
					</select>
					<hr>
				
					<label style="padding-right:238px;">Sex:</label>
					<select name="gender" style="width:125px;">
						<option value="all">All</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>            
					</select>
					<hr>
					<label style="padding-right:167px;">Marital Status:</label>
					<select name="marriage" style="width:125px;">
						<option value="all">All</option>
						<option value="Single">Single</option>
						<option value="Married">Married</option>   
						<option value="Others">Other</option> 						
					</select>
					<hr>
					<label style="padding-right:237px;">Age:</label>
					<select name="age" style="width:125px;">
						<option value="all">All</option>
						<option value="19 < Age AND Age < 30">20 - 29 yrs</option>
						<option value="29 < Age AND Age < 40">30 - 39 yrs</option>
						<option value="39 < Age AND Age < 50">40 - 49 yrs</option>
						<option value="49 < Age AND Age < 60">50 - 59 yrs</option> 
						<option value="59 < Age AND Age < 70">60 - 69 yrs</option> 
						<option value="69 < Age AND Age < 80">70 - 79 yrs</option> 
					</select>
					<hr>
					<label style="padding-right:52px;">Payment Default on 7<sup>th</sup> Month:</label>
					<select name = "default" style="width:125px;">
						<option value="all">All</option>
						<option value="Yes">Yes</option>
						<option value="No" >No </option>
					</select>
					<br>
					<br>
				<center>
				<input type="Submit" value="Submit">
				</center>
			</form>
		</div>
		</li>
		</ul>
		</center>
		<hr width=1150px>
	</body>
</html>
