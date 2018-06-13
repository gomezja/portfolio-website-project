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
			<?php					
				$limit=$_GET['limit'];
				$gender=$_GET['gender'];	
				$education=$_GET['education'];
				$marriage=$_GET['marriage'];
				$age=$_GET['age'];
				$owed=$_GET['owed'];
				$missed=$_GET['missed'];
				
				# Credit Limit conditional values
				$limit_low_default = 0.515;
				$limit_low = 0.348;
				$limit_med_default = 0.469;
				$limit_med = 0.617;
				$limit_high_default = 0.015;
				$limit_high = 0.035;
				# Gender conditional values
				$male_default = 0.430;
				$male = 0.389;
				$female_default = 0.570;
				$female = 0.611;
				# Education conditional values
				$grad_default = 0.305;
				$grad = 0.360;
				$univ_default = 0.505;
				$univ = 0.461;
				$high_default = 0.185;
				$high = 0.163;
				$other_default = 0.005;
				$other = 0.018;
				# Marriage conditional values
				$married_default = 0.482;
				$married = 0.440;
				$single_default = 0.504;
				$single = 0.547;
				$mother_default = 0.014;
				$mother = 0.013;
				# Age conditional values
				$age1_default = 0.331;
				$age1 = 0.327;
				$age2_default = 0.341;
				$age2 = 0.382;
				$age3_default = 0.224;
				$age3 = 0.203;
				$age4_default = 0.088;
				$age4 = 0.076;
				$age5_default = 0.014;
				$age5 = 0.011;
				$age6_default = 0.002;
				$age6 = 0.002;
				# Amount Owed conditional values
				$onone_default = 0.078;
				$onone = 0.114;
				$olow_default = 0.403;
				$olow = 0.379;
				$omed_default = 0.375;
				$omed = 0.343;
				$ohigh_default = 0.145;
				$ohigh = 0.165;
				# Number of Misses conditional values
				$zero_default = 0.357;
				$zero = 0.757;
				$one_default = 0.198;
				$one = 0.126;
				$two_default = 0.111;
				$two = 0.050;
				$three_default = 0.087;
				$three = 0.026;
				$four_default = 0.081;
				$four = 0.017;
				$five_default = 0.026;
				$five = 0.007;
				$six_default = 0.142;
				$six = 0.016;

				switch($limit) {
					case "Low":
						$default1 = $limit_low_default;
						$nondefault1 = $limit_low;
						break;
					case "Medium":
						$default1 = $limit_med_default;
						$nondefault1 = $limit_med;
						break;
					case "High":
						$default1 = $limit_high_default;
						$nondefault1 = $limit_high;
						break;
				}

				switch ($gender) {
					case "Male":
						$default2 = $male_default;
						$nondefault2 = $male;
						break;
					case "Female":
						$default2 = $female_default;
						$nondefault2 = $female;
						break;
				}

				switch ($education) {
					case "Graduate School":
						$default3 = $grad_default;
						$nondefault3 = $grad;
						break;
					case "University":
						$default3 = $univ_default;
						$nondefault3 = $univ;
						break;
					case "High School":
						$default3 = $high_default;
						$nondefault3 = $high;
						break;
					case "Others":
						$default3 = $other_default;
						$nondefault3 = $other;
						break;
				}

				switch ($marriage) {
					case "Married":
						$default4 = $married_default;
						$nondefault4 = $married;
						break;
					case "Single":
						$default4 = $single_default;
						$nondefault4 = $single;
						break;
					case "Others":
						$default4 = $mother_default;
						$nondefault4 = $mother;
						break;
				}

				switch ($age) {
					case "20-29":
						$default5 = $age1_default;
						$nondefault5 = $age1;
						break;
					case "30-39":
						$default5 = $age2_default;
						$nondefault5 = $age2;
						break;
					case "40-49":
						$default5 = $age3_default;
						$nondefault5 = $age3;
						break;
					case "50-59":
						$default5 = $age4_default;
						$nondefault5 = $age4;
						break;
					case "60-69":
						$default5 = $age5_default;
						$nondefault5 = $age5;
						break;
					case "70-80":
						$default5 = $age6_default;
						$nondefault5 = $age6;
						break;
				}

				switch ($owed) {
					case "None":
						$default6 = $onone_default;
						$nondefault6 = $onone;
						break;
					case "Low":
						$default6 = $olow_default;
						$nondefault6 = $olow;
						break;
					case "Medium":
						$default6 = $omed_default;
						$nondefault6 = $omed;
						break;
					case "High":
						$default6 = $ohigh_default;
						$nondefault6 = $ohigh;
						break;
				}
				
				switch ($missed) {
					case "0":
						$default7 = $zero_default;
						$nondefault7 = $zero;
						break;
					case "1":
						$default7 = $one_default;
						$nondefault7 = $one;
						break;
					case "2":
						$default7 = $two_default;
						$nondefault7 = $two;
						break;
					case "3":
						$default7 = $three_default;
						$nondefault7 = $three;
						break;
					case "4":
						$default7 = $four_default;
						$nondefault7 = $four;
						break;
					case "5":
						$default7 = $five_default;
						$nondefault7 = $five;
						break;
					case "6":
						$default7 = $six_default;
						$nondefault7 = $six;
						break;
				}

				$default = $default1 * $default2 * $default3 * $default4 * $default5 * $default6 * $default7;
				$nondefault = $nondefault1 * $nondefault2 * $nondefault3 * $nondefault4 * $nondefault5 * $nondefault6 * $nondefault7;
				
				$default = $default * 0.5;
				$nondefault = $nondefault * 0.5;

				$default_total = $default1 + $default2 + $default3 + $default4 + $default5 + $default6 + $default7;
				$nondefault_total = $nondefault1 + $nondefault2 + $nondefault3 + $nondefault4 + $nondefault5 + $nondefault6 + $nondefault7;
				
				$default_prob = $default_total / ($default_total + $nondefault_total);
				$nondefault_prob = $nondefault_total / ($default_total + $nondefault_total);
				
				if ($default < $nondefault) {
					echo "Won't Default";
				}
				else {
					echo "Will Default";
				}
			?>
		</center>
	</body>
</html>

