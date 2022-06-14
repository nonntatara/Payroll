<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | Employee's Payroll Management System</title>
 	

<?php include('./header.php'); ?>
<?php include('./db_connect.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

</head>
<style>
	body{
		/* width: 100%; */
	    /* height: calc(100%); */
	    /*background: #007bff;*/
		
	}
	main#main{
		/* width:100%; */
		/* height: calc(100%); */
		/* background:white; */
	}
	#login-right{
		position: absolute;
		/* right:0; */
		/* width:40%; */
		/* height: calc(100%); */
		/* background:white; */
		/* display: flex; */
		align-items: center;
	}
	#login-left{
		position: absolute !important;
		/* left:0; */
		width:100% !important;
		height: calc(100%);
		background:#59b6ec61;
		/* display: flex; */
		align-items: center;
		background: url(assets/img/payroll-cover.jpg);
	    background-repeat: no-repeat;
	    background-size: cover;
		/* background: linear-gradient(150deg, #139e09 0%, #14b309 40%, #15c908 51%, #17de09 100%)!important; */

	}
	#login-right .card{
		/* margin: auto; */
		z-index: 1
	}
	.logo {
    /* margin: auto; */
    font-size: 8rem;
    /* background: white; */
    /* padding: .5em 0.7em; */
    border-radius: 50% 50%;
    color: #000000b3;
    z-index: 10;
}
div#login-right::before {
    content: "";
    position: absolute;
    /* top: 0; */
    /* left: 0; */
    /* width: calc(100%); */
    /* height: calc(100%); */
    /* background: #9fa3a7e0; */
}
.box {
  position: relative;
  width: 280px !important;
  height: 320px;
  box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.5);
  border-radius: 15px;
  /* margin: 30px; */
  /* display: flex; */
  justify-content: center;
  align-items: center;
  border-top: 1px solid rgba(255, 255, 255, 0.5);
  border-left: 1px solid rgba(255, 255, 255, 0.5);
  backdrop-filter: blur(5px);
  transform-style: preserve-3d;
  transform: perspective(800px);
  margin-left: -140px;
  margin-top: 160px;
  background: rgba(0, 0, 255, 0.4);
  
}

.myback{
	  /* margin-left: -280px; */
	  margin-left: 50%;
	  /* margin-top: 50%; */

}
</style>

<body>


  <main id="main" class=" bg-dark">
  		<div id="login-left">
		  <!-- <div id="login-right" style="background: green;"> -->
			  <div class="myback">
			  <div class="box">
  				<div class="card-body ">
  						
  					<form id="login-form"  >
  						<div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>
  						<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
  					</form>
  				</div>
  			</div>
			  </div>
  			
  		<!-- </div> -->
  			
  		</div>

  		
   

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else if(resp == 2){
					location.href ='voting.php';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	





<!-- ............................. -->
<script src="https://kit.fontawesome.com/bad7f7f5d4.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>
<script>
    VanillaTilt.init(document.querySelectorAll(".box"), {
  max: 25,
  speed: 400,
  easing: "cubic-bezier(.03,.98,.52,.99)",
  perspective: 500,
  transition: true
});

  </script>
</html>