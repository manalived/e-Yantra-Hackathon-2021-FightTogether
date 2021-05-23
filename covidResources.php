<?php include('header.php');?>

	<h3 style = "color: white">AICTE  Provided  Resources</h3>
	<?php
		if(isset($_SESSION['username']))
		{
			?>
			<a href="../logout.php">
				<button type="button" class="btn btn-danger">Logout</button>
			</a>
		<?php	
		} 
		else{
			?>
			<a href="../login.php">
				<button type="button" class="btn btn-success">Login/Register</button>
			</a>
		<?php
		}
	?>
	</nav>
</div>
<!--Details of Helpline sector from different states-->
<div class="container pt-3">
	<div class="row" style="margin-left:0px">
		<h2>INDIA-WIDE COVID-19 RESOURCES</h2>
		<p>This document primarily includes a list of verified contacts, websites and organizations to access hospital beds, covid medication, plasma donors, oxygen cylinders and meal deliveries in various cities.
			AICTE also added other documents of collated data.</p>
			<!--<p>DISCLAIMER: Although we called all of them and verified it, what works yesterday may not work today or tomorrow. Everyone is running out of stock, capacity and resources so if you find numbers that are switched off/busy/ or not picking up, move on to the next one. We will routinely call and remove the ones that aren’t working and replace it with numbers that work.
			We hope this helps! </p> -->
	</div>
	<center>
		<h4 style="margin-top: 10px">ALL INDIA HELPLINE NUMBERS (verified)</h4>
		<table rules="all" border="1" class="table1 table-hover" style="box-shadow: -3px -1px 18px #00bc8c; padding: 3px 4px; margin-bottom:20px">
			<tr class="table-dark" style="color: #212121;"><th colspan="3" style="text-align: center;">STATE HELPLINE NUMBERS</th></tr>
			<tr>
				<td>Andaman & Nicobar</td>
				<td>03192-232102</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=0&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Andhra Pradesh</td>
				<td>08645-247185</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=1355413940&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Chandigarh</td>
				<td>9779558282</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=1101208197&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Chhattisgarh</td>
				<td>104, 0771-2235091/104</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=1225672705&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Dadra Nagar Haveli</td>
				<td>104</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=0&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Delhi</td>
				<td>011-22307145</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=1485121466&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Goa</td>
				<td>011-23978046 or 1075</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=1355413940&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Gujarat</td>
				<td>079-23250818</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=482374249&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Haryana</td>
				<td>8558893911</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=1101208197&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Himachal Pradesh</td>
				<td>104</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=684132014&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Jammu</td>
				<td>0191-2571912</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=952836498&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Jharkhand</td>
				<td>104, 06512446923</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=1907793174&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Karnataka</td>
				<td>104, 080-46848600, 1075</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=1355413940&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Kerala</td>
				<td>0471-2552056</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=1355413940&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Ladakh</td>
				<td>01982256462</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=0&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Lakshadweep</td>
				<td>104, center’s no.</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=0&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Madhya Pradesh</td>
				<td>104,  0755-2704201</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=2062935656&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Maharashtra</td>
				<td>020-26127394</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=1617454621&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Meghalaya</td>
				<td>108</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=321020211&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Mizoram</td>
				<td>102</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=321020211&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Mizoram</td>
				<td>102</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=321020211&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Nagaland</td>
				<td>7005539653</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=321020211&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Odisha</td>
				<td>9439994859</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=1970086693&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Puducherry</td>
				<td>104</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=321020211&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Punjab</td>
				<td>104</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=1101208197&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Sikkim</td>
				<td>104, 0183-2535322</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=321020211&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Tamil Nadu</td>
				<td>044-29510500</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=1355413940&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Telangana</td>
				<td>044-29510500</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=0&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Uttarakhand</td>
				<td>104, 0135-2722100</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=684132014&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Uttar Pradesh</td>
				<td>0522-2237515</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=684132014&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>Uttar Pradesh</td>
				<td>0522-2237515</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=934609525&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td>West Bengal</td>
				<td>1800313444222, 03323412600</td>
				<td><a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRR1glENQvCEZN8H7PzCq3bjSr2bQIIodVOd2kPmGy-wD0JMIFTHXVj8eLr0gW0Ya9UAO7Fti6XTUiz/pubhtml?gid=340528570&single=true" target="_blank">Sheets</a></td>
			</tr>
			<tr>
				<td colspan="3">The central helpline number: 011-23978046</td>				  
			</tr>
		</table>
	</center>
</div>
</body>
</html>