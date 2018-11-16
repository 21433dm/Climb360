<?php //index.php
include('header.php');

if (isset($_POST['send'])) {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$tel = $_POST['tel'];
		$address1 = $_POST['address1'];
		$address2 = $_POST['address2'];
		$city = $_POST['city'];
		$postcode = $_POST['postcode'];
		$county = $_POST['county'];
		$comments = $_POST['comments'];
		
		
			if(strlen($fname) >= 3 && strlen($fname) <= 32) {

					if(strlen($lname) >= 3 && strlen($lname) <= 32) {

							if (preg_match('/[a-zA-Z0-9_]+/', $fname)) { 
							
								if (preg_match('/[a-zA-Z0-9_]+/', $lname)) {
									
									if(preg_match('/[0-9]+/', $tel)) {

										if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

												if(!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {

											DB::query('INSERT INTO users VALUES (\'\', :fname, :lname, :email, :tel, :address1, :address2, :city, :postcode, :county, :comments)', array(':fname'=>$fname, ':lname'=>$lname, ':email'=>$email, ':tel'=>$tel, ':address1'=>$address1, ':address2'=>$address2, ':postcode'=>$postcode, ':city'=>$city, ':county'=>$county, ':comments'=>$comments));
												
											} else {
												echo '<p>Email in use!';
										}

									} else {
											echo '<p>Please provide valid email address!';
										}

								} else {
										echo '<p>Please enter telephone number!';
								}

							} else {
									echo '<p>Please enter first name!';
								}

						} else {
								echo '<p>Please enter last name!';
					}
				}
		}
}
?>

<div class="table">
				<form class="Form" action="" method="post">
					<table>
						<tr>
							<td>
							<input class="StyleTxtField" type="text" name="fname" placeholder="First Name...">
							</td>
							<td>
							<input class="StyleTxtField" type="text" name="lname" placeholder="Last Name...">
							</td>
						</tr>
						<tr>
							<td>
							<input class="StyleTxtField" type="text" name="email" placeholder="Email Address...">
							</td>
							<td>
							<input class="StyleTxtField" type="text" name="tel" placeholder="Tel No...">
							</td>
						</tr>
						<tr>
							<td>
							<input class="StyleTxtField" type="text" name="address1" placeholder="Address line 1...">
							</td>
							<td>
							<input class="StyleTxtField" type="text" name="address2" placeholder="Address line 2...">
							</td>
						</tr>
						<tr>
							<td>
							<input class="StyleTxtField" type="text" name="city" placeholder="City...">
							</td>
							<td>
							<input class="StyleTxtField" type="text" name="postcode" placeholder="Postcode...">
							</td>
						</tr>
						<tr>
							<td>
							<input class="StyleTxtField" type="text" name="county" placeholder="County...">
							</td>
							<td>
							<textarea name="comments" rows="8" cols="50" placeholder="Comments"></textarea>
							</td>
						</tr>
						<tr>
							<td>
							<input type="submit" name="send" value="Send!">
							</td>
						</tr>
					</table>
				</form>
				</div>
			</div>
			<br>
			<br>
			<div class="Footer">
				&nbsp; &copy; Climb360 Social Enterprise 2017
			</div>
		</body>
	<html>