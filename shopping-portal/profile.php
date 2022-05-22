
<?php
session_start();
if(isset( $_SESSION["email"]) &&  $_SESSION["email"] != "") {
  
    
} else {
    header('location:login.php');
}


?>

<?php include "lib/functions.php";
$pdo = get_connection();
?>


<link rel="stylesheet" href="css/profile.css" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
<body>
<div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">Account settings</h4>
	<form method="POST" enctype="multipart/form-data">
			 <?php
                $res=$pdo->prepare("SELECT * FROM user where email =?");
                $email =$_SESSION["email"];
                $res->execute([$email]);
              
                while($row = $res->fetch()){
					
                    ?>
    <div class="d-flex align-items-start py-3 border-bottom"> <img src="<?php echo $row["IMG_URL"]; ?>" class="img" alt="">
        <div class="pl-sm-4 pl-2" id="img-section"> <b>Profile Photo</b>
            <p>Accepted file type .png. Less than 1MB</p> <input type ="file" name="profile" class="btn button border">
        </div>
    </div>

    <div class="py-2">
        <div class="row py-2">


	<div class="py-2">
		<div class="row py-2">		
            <div class="col-md-6"> <label for="firstname">Name</label> <input type="text" name="name" class="bg-light form-control" placeholder="<?php echo $row["customerName"]; ?>"> </div>
			<div class="col-md-6"> <label for="address">Address</label> <input type="text" name="address" class="bg-light form-control" placeholder="<?php echo $row["address"]; ?>"> </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6"> <label for="email">Email Address</label> <div class="bg-light form-control"><?php echo $row["email"]; ?></div> 
			
			</div>
            <div class="col-md-6 pt-md-0 pt-3"> <label for="phone">Phone Number</label> <input type="" name="phone_number" class="bg-light form-control" placeholder="<?php echo $row["phone_number"]; ?>"> </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6"> <label for="country">Country</label> <select name="country" id="country" class="bg-light">
                    <option value="Egypt" selected>Egypt</option>
                    <option value="usa">USA</option>
                    <option value="uk">UK</option>
                    <option value="uae">UAE</option>
                </select> </div>
            <div class="col-md-6 pt-md-0 pt-3" id="lang"> <label for="language">Language</label>
                <div class="arrow"> <select name="language" id="language" class="bg-light">
                        <option value="english" selected>English</option>
                        <option value="english_us">English (United States)</option>
                        <option value="enguk">English UK</option>
                        <option value="arab">Arabic</option>
                    </select> </div>
            </div>
        </div>
				<?php } ?>
        <div class="py-3 pb-4 border-bottom"> <button class="btn btn-primary mr-3" name="save">Save Changes</button> <button name="cancel"  class="btn border button">Cancel</button> </div>
        <div class="d-sm-flex align-items-center pt-3" id="deactivate">
            <div> <b>Deactivate your account</b>
                <p>Details about your company account and password</p>
            </div>
            <div class="ml-auto"> <button class="btn danger" name= deactivate>Deactivate</button> </div>
			</form>
        </div>
    </div>
</div>
</body>

<?php 
	if(isset($_POST["save"])){
		$address=$_POST["address"];
		$customer_name=$_POST["name"];
		$phone_number=$_POST["phone_number"];
		$name =$_SESSION["username"][0];
		$email =$_SESSION["email"];
		
		$v1=rand(1111,9999);
        $v2=rand(1111,9999);
        $v3=$v1.$v2;
        $v3=md5($v3);
		$fnm=$_FILES["profile"]["name"];
        
		
		
		if (isset($fnm) && $fnm!=""){
			$dst="user-image/".$v3.$fnm;
			copy($_FILES["profile"]["tmp_name"],$dst);
			$stmt = $pdo->prepare('UPDATE USER SET IMG_URL =:dst WHERE email =:email');
			$stmt->execute(['dst' => $dst,'email'=>$email]);
			
		}
		
		if(isset($address) && $address !=""){
			$stmt = $pdo->prepare('UPDATE USER SET address =:address WHERE email =:email');
			$stmt->execute(['address' => $address,'email'=>$email]);
		}
		if(isset($phone_number )&& $phone_number !=""){
		
			$stmt = $pdo->prepare('UPDATE USER SET phone_number =:phone_number WHERE email =:email');
			$stmt->execute(['phone_number' => $phone_number,'email'=>$email]);
		}

		if(isset($customer_name)&& $customer_name!=""){	
			$stmt = $pdo->prepare('UPDATE USER SET customerName =:customer_name WHERE email =:email');
			$stmt->execute(['customer_name' => $customer_name,'email'=>$email]);
		}
		?>
		
		<script type="text/javascript">

            setTimeout(function () {
                window.location.href=window.location.href;

            },100);
        </script>
	<?php
	}
	if(isset($_POST['deactivate'])){
		
		
		$stmt=$pdo->prepare('DELETE FROM USER WHERE email =?');
        $stmt->execute([$email]);
		header('location:logout.php');
	}
	
	if(isset($_POST['cancel'])){
		header('location:index.php');
	
	
	}
	
	?>








