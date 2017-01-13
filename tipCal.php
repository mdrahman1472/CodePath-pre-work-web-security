
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
      <?php
          if(isset($_POST['subtotal']) && ((float)$_POST['subtotal']) > 0)
          {
              $tip = (float)$_POST["subtotal"] * (float)($_POST['Percentage']/100);
              $total = $tip + (float)$_POST["subtotal"];
          } else if(isset($_POST['subtotal']) && ((float)$_POST['subtotal']) <= 0)
          {
              $error = true;
          }
    ?>
    <form action="" method="POST">
        <span>Bill subtotal: $</span>
    
        <input type="text" name="subtotal" value="<?php 
        if(isset($_POST['subtotal'])) 
          echo $_POST['subtotal']?>"><br>
    
        <tr>
      
            <td>Tip percentage:</td>
        <br></br>
        </tr>
        <?php
            if(isset($_POST['Percentage']))
                $dPer = (float)$_POST['Percentage'];
            else
                $dPer = 10;
        
            $pArr = array("10", "15", "20"); // array of percentage
      
            for($i = 0; $i <= 2 ; $i++)
            {
                if($pArr[$i] == $dPer)
                    echo '<input type="radio" name="Percentage" value="'. $pArr[$i] .
                    '" checked>' . $pArr[$i] . '%';
                else
                    echo '<input type="radio" name="Percentage" value="'. $pArr[$i] .
                    '">' . $pArr[$i] . '%';
            }
        ?> 
        <br>
            <td><button type="submit">Submit</button></td></tr>
     </form>
    
   <?php
        if(isset($tip) && isset($total)){
      
          if (is_float($tip) && is_float($total))
              {
            
            echo "Tip: $" . number_format($tip, 2). "<br>";
            echo "Total: $" . number_format($total, 2);
            echo "<br>";
              }
        }
        if(isset($error) && $error){
            echo "<p style=color:red;>Error: enter valid number</p>"; // for invalid input
          }
    ?>

    </div>
	</body>
</html>