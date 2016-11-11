 <div class="container-fluid">
    <section class="container">
		<div class="container-page">				
			<div class="col-md-6">
				<h3 class="dark-grey">Registration</h3>
				<form action="" method="POST">
				<div class="form-group col-lg-12">
					<label>Name</label>
					<input type="text" name="u_name" class="form-control" id="" placeholder="Enter Your Name" required>
				</div>
					<div class="form-group col-lg-6">
					<label>Password</label>
					<input type="password" name="u_pass" class="form-control" id="" value="" placeholder="Enter Your Password" required>
				</div>
				
				<div class="form-group col-lg-6">
					<label>Email</label>
					<input type="email" name="u_email" class="form-control" id="" value="" placeholder="Enter Your Email" required>
				</div>
					<div class="form-group col-lg-12">
					<label>Country</label>
					<select name="u_country">
						<option>Select a Country</option>
						<option>Sri Lanka</option>
						<option>India</option>
						<option>Maldives</option>
						<option>Pakistan</option>
					</select>
				</div>
					<div class="form-group col-lg-12">
					<label>Gender</label>
					<select name="u_gender">
						<option>Select a Gender</option>
						<option>Male</option>
						<option>Female</option>
						
					</select>
				</div>
					<div class="form-group col-lg-12">
					<label>Birth Day</label>
					<input type="date" name="u_birthday" class="form-control" id="" value="" required>
				</div>			
			
			</div>
		
			<div class="col-md-6">
				<h3 class="dark-grey">Terms and Conditions</h3>
				<p>
					By clicking on "Register" you agree to The Company's' Terms and Conditions
				</p>
				<p>
					While rare, prices are subject to change based on exchange rate fluctuations - 
					should such a fluctuation happen, we may request an additional payment. You have the option to request a full refund or to pay the new price. (Paragraph 13.5.8)
				</p>
				<p>
					Should there be an error in the description or pricing of a product, we will provide you with a full refund (Paragraph 13.5.6)
				</p>
				<p>
					Acceptance of an order by us is dependent on our suppliers ability to provide the product. (Paragraph 13.5.6)
				</p>
				
				<button type="submit" class="btn btn-primary" name="sign_up">Register</button>
			</div>
		</div>
		</form>
	<?php 
    include("user_insert.php");  
	 ?>
</div>
  
 
</body>
</html>