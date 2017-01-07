
<!DOCTYPE html>
<html>
	<head>
		<title>Tip Calculator</title>
		
		<style type="text/css">
			.input a{text-decoration:none; color:lime}
			.input h2{font-family: 'Open Sans', sans-serif;
				margin-top: 20px; margin-bottom: 20px; text-align: center; margin-bottom: 30px;
			}

			
			.input{

				width: 384px;
				height: auto;
				background-color:rgb(238,235,232);
        		border: solid 1px #ffd32e;
				margin: 0 auto;
				margin-top: 200px;
				padding-top: 20px;
				padding-left: 50px;
				padding-bottom: 20px;
				-webkit-border-radius:10px;
				-moz-border-radius:10px;
				-o-border-radius:10px;
				font-family: arial;
				color: black;
				}
			.input input[type="text"]{
				width: 150px;
				height: 30px;
				border: 0;
				border-radius: 5px;
				font-size: 14px;
				padding-left: 5px;
				margin-top: 8px;
				margin-bottom: 20px;
				-webkit-border-radius:5px;
				-moz-border-radius:5px;
				-o-border-radius:5px;
				margin-left: 10px;

			}
			
	
			.input button{
				margin-top: 15px;
				margin-bottom: 20px;
				width: 88px;
				height: 35px;
				border: 0;
				border-radius: 5px;
				font-size: 16px;
				-webkit-border-radius:5px;
				-moz-border-radius:5px;
				-o-border-radius:5px;
				background-color: rgb(106,187,155);
			}

			.bottom{
				border: solid 3px #ffd32e;
			}

		</style>
	</head> 


	<body>
		
		<div class = "input">
			<h2>Tip Calculator</h2>
			<form action="" method="post">
			<table>
				<tr>
					<td>Bill Subtotal: </td>
					<td>
						<input type="text" name = "amount" value="<?php
							if ($_POST){
								echo $_POST['amount'];
							}	
						?>">
					</td>
				</tr>
				<tr>
					<td>Tip Percentage: </td>
				</tr>
				<tr>
					<td><input type="radio" name="per" value="ten" checked>10%</td>
					<td><input type="radio" name="per" value="fifteen">15%</td>
					<td><input type="radio" name="per" value="twenty">20%</td>
				</tr>
				<tr><td><button type="submit">Submit</button></td></tr>
				
				
				<tr>
					
					<td><?php
					if ($_POST) {
						if ($_POST['amount'] > 0) {
							echo "Tip: $".calculateTip($_POST['amount']);	
						}
						else{echo "";}	
					}
					else {
						echo "";
					}
					?>
					</td>	
				</tr>

				<tr>
					<td><?php
					if ($_POST) {
						if ($_POST['amount'] > 0) {
						echo "Total: $".calculateTotal($_POST['amount']);
						}
						else{echo "";}
					}
					else {
						echo "";
					}
					?>
					</td>	
				</tr>
				

			</table>	  
			</form>	
		
		</div>
		<?php
		function calculateTip($amount){
			if($_POST['per']=="ten"){
				return number_format($amount*0.1, 2);	
			}
			else if ($_POST['per'] == "fifteen") {
				return number_format($amount*0.15, 2);
			}
			else if ($_POST['per'] == "twenty") {
				return number_format($amount*0.20, 2);
			}
		}
		?>

	<?php
		function calculateTotal($amount) {
			return number_format(calculateTip($amount)+$amount,2);
		}
	?>
	</body>
</html>