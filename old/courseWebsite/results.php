<!DOCTYPE HTML>
<html>
	<title>
		Data Mart Results
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
		
		div{
			min-height:200px;
			width:400px;
			background-color:rgb(163,194,194);
			border-style:solid;
			border-color:black;
			border-width:2px;
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
				<li><a href=datamart.php>Data Mart</a><li>
			</ul>
			
			<h1>
				Data Mart Results
			</h1>
			<hr width=1150px>
			<?php
				$servername = "athena.ecs.csus.edu";
				$username = "team9_user";
				$password = "team9_db";
				$dbname = "team9";
				
				// create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				
				// check connection
				if ($conn->connect_error)
					die("Connection failed: " . $conn->connect_error);
				
				// the function
				function paging_info($tot_rows, $pp, $curr_page) {
					$pages = ceil($tot_rows / $pp);
					
					// start array
					$data = array();
					$data['si'] = ($curr_page * $pp) - $pp;
					$data['pages'] = $pages;
					
					// if current page is initial (empty) then set to one
					if($curr_page == "")
						$curr_page = 1;
					
					$data['curr_page'] = $curr_page;
					
					return $data;
				}
				
				// retrieve user input
				$name=$_GET["education"];
				$gender=$_GET["gender"];
				$marriage=$_GET["marriage"];
				$age=$_GET["age"];
				$default=$_GET["default"];

				// retrieve page number
				$page=$_GET["page"];
				
				// use page number to see which portion of output will be seen
				if($page=="" || $page =="1")
					$page1=0;
				else
					$page1=($page*250)-250;
				
				// make mysql query
				if('all' == $name && 'all' == $gender && 'all' == $marriage && 'all' == $age && 'all' == $default)
					$sql = "SELECT * FROM customer_dim, default_fact, repayment_status_dim WHERE customer_dim.customer_id = default_fact.customer_id AND repayment_status_dim.repayment_status_id = default_fact.repayment_status_id";
				else {
					if('all' != $name)
						$edu = "education='" . $name . "'";
					else
						$edu = "";
					
					if('all' != $gender && $edu == "")
						$gen = "gender='" . $gender . "'";
					else if('all' != $gender)
						$gen = " AND gender='" . $gender . "'";
					else
						$gen = "";
					
					if('all' != $marriage && $edu == "" && $gen == "")
						$mar = "marital_status='" . $marriage . "'";
					else if('all' != $marriage)
						$mar = " AND marital_status='" . $marriage . "'";
					else
						$mar = "";
					
					if('all' != $age && $edu == "" && $gen == "" && $mar == "")
						$ag = "(" . $age . ")";
					else if('all' != $age)
						$ag = " AND (" . $age . ")";
					else
						$ag = "";
					
					if('all' != $default && "" != $age && $edu == "" && $gen == "" && $mar == "" && $ag == "")
						$def = "default_payment_next_month='" . $default . "'";
					else if('all' != $default)
						$def = " AND default_payment_next_month='" . $default . "'";
					else
						$def = "";
					
					$sql = "SELECT * FROM customer_dim, default_fact, repayment_status_dim WHERE customer_dim.customer_id = default_fact.customer_id AND repayment_status_dim.repayment_status_id = default_fact.repayment_status_id AND " . $edu . $gen . $mar . $ag . $def;
				}
				
				// count number of results and save to count
				$result = $conn->query($sql);
				$count = $result->num_rows;

				// create new query with page limit enforced
				$sql = $sql . " LIMIT " . $page1 . ",250";

				$result = $conn->query($sql);

				// get paging info from function
				$paging_info = paging_info($count,250,$page);
				
				

				// go through data and display
				if($result->num_rows > 0) {
					// show output information
					echo "Showing records " . ($page1 + 1) . " through " . ($page1 + 250). " of " . $count . "<br>";
					$co = $count/250;
					$a = ceil($co);
					echo "Page " . $paging_info["curr_page"] . " of $a<br><br>";
					
					// create display table
					echo "<table border=1>
					<tr>
						<th>Customer ID</th>
						<th>Limit Balance</th>
						<th>Gender</th>
						<th>Education</th>
						<th>Marital Status</th>
						<th>Age</th>
						<th>April Status</th>
						<th>May Status</th>
						<th>June Status</th>
						<th>July Status</th>
						<th>August Status</th>
						<th>September Status</th>
						<th>Default Payment</th>
					</tr>";
					
					while($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row["customer_id"] . "</td>";
						echo "<td>" . $row["given_credit"] . "</td>";
						echo "<td>" . $row["gender"] . "</td>";
						echo "<td>" . $row["education"] . "</td>";
						echo "<td>" . $row["marital_status"] . "</td>";
						echo "<td>" . $row["age"] . "</td>";
						echo "<td>" . $row["april_status"] . "</td>";
						echo "<td>" . $row["may_status"] . "</td>";
						echo "<td>" . $row["june_status"] . "</td>";
						echo "<td>" . $row["july_status"] . "</td>";
						echo "<td>" . $row["august_status"] . "</td>";
						echo "<td>" . $row["september_status"] . "</td>";
						echo "<td>" . $row["default_payment_next_month"] . "</td>";
						echo "</tr>";
					}
				}
				else
					echo "<br><br><br><br>No Results Were Found!";

				// If the current page is more than 1, show the First and Previous links
				if($paging_info['curr_page'] > 1) {
					?>
					<a href="results.php?page=1&education=<?php echo $name; ?>&gender=<?php echo $gender; ?>&marriage=<?php echo $marriage; ?>&age=<?php echo $age; ?>&default=<?php echo $default; ?>" style="text-decoration:none ">First </a>
					<a href="results.php?page=<?php echo ($paging_info['curr_page'] - 1); ?>&education=<?php echo $name; ?>&gender=<?php echo $gender; ?>&marriage=<?php echo $marriage; ?>&age=<?php echo $age; ?>&default=<?php echo $default; ?>" style="text-decoration:none ">Prev </a>
					<?php
				}

				// display 7 links
				$max = 7;
				if($paging_info['curr_page'] < $max)
					$sp = 1;
				elseif($paging_info['curr_page'] >= ($paging_info['pages'] - floor($max / 2)) )
					$sp = $paging_info['pages'] - $max + 1;
				elseif($paging_info['curr_page'] >= $max)
					$sp = $paging_info['curr_page']  - floor($max/2);

				// If the current page >= $max then show link to 1st page
				if($paging_info['curr_page'] >= $max) {
					?>
					<a href="results.php?page=1&education=<?php echo $name; ?>&gender=<?php echo $gender; ?>&marriage=<?php echo $marriage; ?>&age=<?php echo $age; ?>&default=<?php echo $default; ?>" style="text-decoration:none ">1 </a> 
					..
					<?php 
				}

				for($i = $sp; $i <= ($sp + $max -1);$i++) {
					if($i > $paging_info['pages'])
						continue;
					if($paging_info['curr_page'] == $i) {
						?>
						<span class='bold'><?php echo $i . " "; ?></span>
						<?php
					}
					else {
						?>
						<a href="results.php?page=<?php echo $i; ?>&education=<?php echo $name; ?>&gender=<?php echo $gender; ?>&marriage=<?php echo $marriage; ?>&age=<?php echo $age; ?>&default=<?php echo $default; ?>" style="text-decoration:none "><?php echo $i . " "; ?></a>
						<?php
					}
				}
			
	
				// if the current page is less than say the last page minus $max pages divided by 2
				if($paging_info['curr_page'] < ($paging_info['pages'] - floor($max / 2))) {
					?>
					..
					<a href="results.php?page=<?php echo $paging_info['pages']; ?>&education=<?php echo $name; ?>&gender=<?php echo $gender; ?>&marriage=<?php echo $marriage; ?>&age=<?php echo $age; ?>&default=<?php echo $default; ?>" style="text-decoration:none "><?php echo $paging_info['pages']; ?></a> 
					<?php 
				}
				  
				//Show last two pages if we're not near them
				if($paging_info['curr_page'] < $paging_info['pages']) { 
					?>
					<a href="results.php?page=<?php echo ($paging_info['curr_page'] + 1); ?>&education=<?php echo $name; ?>&gender=<?php echo $gender; ?>&marriage=<?php echo $marriage; ?>&age=<?php echo $age; ?>&default=<?php echo $default; ?>" style="text-decoration:none "> Next </a>
					<a href="results.php?page=<?php echo $paging_info['pages']; ?>&education=<?php echo $name; ?>&gender=<?php echo $gender; ?>&marriage=<?php echo $marriage; ?>&age=<?php echo $age; ?>&default=<?php echo $default; ?>" style="text-decoration:none "> Last </a>
					<?php 
				} 
			?>
		</center>
	</body>
</html>