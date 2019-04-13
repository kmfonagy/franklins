<?php
	define("TITLE", "Contact | Franklin's Fine Dining");
	include('includes/header.php');

	/*
		NOTE:
		In the form in contact.php, the name text field has the name "name"
		If the user submits the form, the $_POST['name'] variable will be
		automatically created, and will contain the text they typed into
		the field. The $_POST['email'] variable will contain whatever they typed
		into the email field.
	
	
		PHP used in this script:
		
		preg_match()
		- Perform a regular expression match
		- http://ca2.php.net/preg_match
		
		isset()
		- Determine if a variable is set and is not NULL
		- http://ca2.php.net/manual/en/function.isset.php
		
		$_POST
		- An associative array of variables passed to the current script via the HTTP POST method.
		- http://www.php.net/manual/en/reserved.variables.post.php
		
		trim()
		- Strip whitespace (or other characters) from the beginning and end of a string
		- http://www.php.net/manual/en/function.trim.php
		
		exit
		- Output a message and terminate the current script
		- http://www.php.net//manual/en/function.exit.php
		
		die()
		- Equivalent to exit
		- http://ca1.php.net/manual/en/function.die.php
		
		wordwrap()
		- Wraps a string to a given number of characters
		- http://ca1.php.net/manual/en/function.wordwrap.php
		
		mail()
		- Send mail
		- http://ca1.php.net/manual/en/function.mail.php
	*/
?>

	<div id='contact'>
		<hr>
		<h1>Get in touch with us!</h1>

		<?php
			//Check for header injection
			function has_header_injection($str){
				return preg_match('/[\r\n]/', $str);
			}

			if(isset($_POST['contact_submit'])){
				$name	= trim($_POST['name']);
				$email	= trim($_POST['email']);
				$msg 	= $_POST['message'];

				//check for header injections in name or email
				if(has_header_injection($name) || has_header_injection($email)){
					die(); //if true kill script
				}

				if(!$name || !$email || !$msg){
					echo '<h4 class="error">All Fields Required.</h4><a href="contact.php" class="button block">Go Back</a>';
					exit;
				}

				$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

				if ($email === FALSE) {
				    echo '<h4 class="error">Invalid email.</h4><a href="contact.php" class="button block">Go Back</a>';
				    exit(1);
				}

				//Add recipient email to a variable
				$to = "kmikefonagy@gmail.com";

				//Create a subject
				$subject = "$name sent you a message via Franklin's contact form";

				//Construct the message
				$message = "Name: $name\r\n";
				$message .= "Email: $email\r\n";
				$message .= "Message:\r\n $msg";

				//If subscribed check box 'YES'
				if (isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe'){
					//add new line to message variable
					$message .="\r\n\r\n Please add $email to the mailing list.\r\n";
				}

				$message = wordwrap($message, 72);

				//Set mail headers to a variable
				$headers = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
				$headers .= "From: $name <$email> \r\n";
				$headers .= "X-Priority: 1\r\n";
				$headers .= "X-MSMail-Priority: High\r\n\r\n";

				//send the email
				mail($to, $subject, $message, $headers);
		?>

		<!--show success message after email sent-->
		<h5>Thanks for contacting Franklin's!</h5>
		<p>Please allow 24 hours for a response.</p>
		<p><a href="/final" class="button block">&laquo; Go to Home Page</a></p>

		<?php
			}else{
		?>

		<form method="post" action="" id="contact-form">
			<label for="name">Your name</label>
			<input type="text" id="name" name="name">
			
			<label for="email">Your email</label>
			<input type="text" id="email" name="email">
			
			<label for="message">Your message</label>
			<textarea id="message" name="message"></textarea>
			
			<input type="checkbox" name="subscribe" id="subscribe" value="Subscribe">
			<label for="subscribe">Subscribe to newsletter</label>
			
			<input type="submit" class="button next" name="contact_submit" value="Send Message">
		</form>

		<?php } ?>

		<hr>
		
	</div><!-- contact -->

<?php
  include('includes/footer.php');
?>