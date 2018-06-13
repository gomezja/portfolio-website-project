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
		
		li.menu a{
			display:table-cell;
			text-decoration:none;
			
			color:white;
			
			width:auto;
			padding:10px 25px;
		}
		
		li.menu a:hover{
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
			padding:0px 25px;
		}

		div{
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
		
		div.col{
			width:400px;
			
			overflow:hidden;
			text-align:left;
		}
	</style>

	<body>
		<center>
			<ul class="menu">
				<li class="menu"><a href="http://athena.ecs.csus.edu/~mei/177/csc177.html">CSc 177</a></li>
				<li class="menu"><a href=index.html>Home</a></li>
				<li class="menu"><a href=ResearchAndProposal.pdf>Research Paper & Proposal</a></li>
				<li class="menu"><a href=ProgressReport.pdf>Progress Report</a></li>
				<li class="menu"><a href=ProjectPresentation.pdf>Project Oral Presentation</a></li>
				<li class="menu"><a href=FinalProjectReport.pdf>Final Project Report</a></li>
				<li class="menu"><a href=datamart.php>Data Mart</a></li>
			</ul>
			
			<h1>Data Mining Demo (WIP)</h1>
			<hr width=1150px>
		</center>
		<center>
		<ul class="self">
			<li>
		<div class="col">
			<center>
			<p style="font-size:18px;"><b>Required Info</b></p>
			</center>
			<div>
				<form action="dataminingresults.php" method="get">
					<label style="padding-right:185px;">Credit Limit:</label>
						<select name="limit" style="width:125px;">
					<option value="Low">Low</option>
					<option value="Medium">Medium</option>
					<option value="High">High</option>
					</select>
					<hr>

					<label style="padding-right:238px;">Sex:</label>
					<select name="gender" style="width:125px;">
						<option value="Male">Male</option>
						<option value="Female">Female</option>            
					</select>
					<hr>
				
					<label style="padding-right:92px;">Highest Education Level:</label>
					<select name="education" style="width:125px;">
						<option value="High School">High School</option>
						<option value="University">University</option>        
						<option value="Graduate School">Graduate School</option>    
						<option value="Others">Others</option>    
					</select>
					<hr>
				
					<label style="padding-right:167px;">Marital Status:</label>
					<select name="marriage" style="width:125px;">
						<option value="Single">Single</option>
						<option value="Married">Married</option>
						<option value="Others">Others</option>
					</select>
					<hr>
					
					<label style="padding-right:237px;">Age:</label>
					<select name="age" style="width:125px;">
						<option value="20-29">20-29</option>
						<option value="30-39">30-39</option>
						<option value="40-40">40-49</option>
						<option value="50-59">50-59</option>
						<option value="60-69">60-69</option>
						<option value="70-80">70-80</option>
					</select>
					<hr>
					
					<label style="padding-right:164px;">Amount Owed:</label>
					<select name = "owed" style="width:125px;">
						<option value="None">None</option>
						<option value="Low">Low</option>
						<option value="Medium">Medium</option>
						<option value="High">High</option>
					</select>
					<hr>
					
					<label style="padding-right:78px;">Number Missed Payments:</label>
					<select name ="missed" style="width:125px;">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
					</select>
					<br>
					<br>
				<center>
				<input type="Submit" value="Submit">
				<a href=datamining.php>Reset Form</a>
				</center>
			</form>
		</div>
		</li>
		</ul>
		<hr width=1150px>
		</center>
	</body>
</html>

