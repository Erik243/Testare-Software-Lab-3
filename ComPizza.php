
<!DOCTYPE html>
<html>
<head>
<title>Pizza Shop</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<h1 style="text-align: center;">Pizza Shop</h1>
<div class="topnav">
  <a href="index.php">Home</a>
  <a href="ComPizza.php"class="active">Command Pizza</a>
  <a href="Contact.php">Contact</a>

</div>
<div id="conntent">


  <?php
         // define variables and set to empty values
         $nameErr = $emailErr = $pizzaErr  = $adressErr = $phoneErr = "";
         $name = $email = $adress = $pizza = $comment = $phone = "";

         

       
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }else {
               $name = test_input($_POST["name"]);
            }
            
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = test_input($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
            if (empty($_POST["phone"])) {
               $phoneErr = "phone is required";
            }else {
                $phone = test_input($_POST["phone"]);
                $valid_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
		 		$valid_number = str_replace("-", "", $valid_number);
	            if (strlen($valid_number) < 9 || strlen($valid_number) > 14 ||strlen($valid_number) !=strlen($phone)  ) {
	               $phoneErr = "Invalid Phone format";
	            }else {
	               $phone = test_input($_POST["phone"]);
	            }
            }
            if (empty($_POST["comment"])) {
               $comment = "";
            }else {
               $comment = test_input($_POST["comment"]);
            }
            
            if (empty($_POST["adress"])) {
               $adressErr = "Adress is required";
            }else {
               $adress = test_input($_POST["adress"]);
            }

            if (empty($_POST["pizza"])) {
               $pizzaErr = "Pizza is required";
            }else {
               $pizza = test_input($_POST["pizza"]);
            }


         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>
     
      <h2 align="center" >Command Pizza !</h2>
     
      <p align="center" ><span class = "error">* Required field.</span></p>
     
      <form id="form"  method = "post" action = "<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h3>Pizza:</h3>	
         <table >

         	<tr><h3>
                <input type="radio" id="fresca" name="pizza" value="fresca">
				<label for="fresca">Fresca</label>
				<input type="radio" id="furiosa" name="pizza" value="furiosa">
				<label for="furiosa">Furiosa</label>
				<input type="radio" id="gusto" name="pizza" value="gusto">
				<label for="gusto">Gusto</label>
				<span class = "error">* <?php echo $pizzaErr;?></span>
            </tr></h3>
            <tr>
               <td>Name:</td>
               <td><input type = "text" name = "name">
                  <span class = "error">* <?php echo $nameErr;?></span>
               </td>
            </tr>
           
            <tr>
               <td>E-mail: </td>
               <td><input type = "text" name = "email">
                  <span class = "error">* <?php echo $emailErr;?></span>
               </td>
            </tr>
           
            <tr>
               <td>Phone:</td>
               <td> <input type = "text" name = "phone">
                  <span class = "error">*<?php echo $phoneErr;?></span>
               </td>
            </tr>

            <tr>
               <td>Adress:</td>
                <td><input type = "text" name = "adress">
                	 <span class = "error">* <?php echo $adressErr;?></span>
            </tr>

            <tr>
               <td>Classes:</td>
               <td> <textarea name = "comment" rows = "5" cols = "40"></textarea></td>
            </tr>
            
            	
            <td>
               <input type = "submit" name = "submit" value = "Submit"> 
            </td>
				
         </table>
			
      </form>
      
      <?php
         echo "<h2>Your given values are as:</h2>";
         echo "Name:" ;echo $name;
         echo "<br>";
         echo "E-mail:";echo $email;
         echo "<br>";
         echo "Adress:";echo $adress;
         echo "<br>";
         echo "Phone:";echo $phone;
         echo "<br>";
         echo "Pizza:";echo $pizza;
         echo "<br>";
         echo "Classes:";
         echo "<br>";        
         echo $comment;    
      ?>
  
</div>
</form>

</body>
</html>