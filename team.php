<?php
	define("TITLE", "Team | Franklin's Fine Dining");
   include('includes/header.php');
?>

	<div id="team-members" class="cf">
		
		<h1>Our Team at Franklin's</h1>

		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis nunc eget lorem dolor sed viverra. Integer enim neque volutpat ac. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum. Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Sem et tortor consequat id porta nibh venenatis cras sed. Facilisi etiam dignissim diam quis enim lobortis scelerisque. Sed adipiscing diam donec adipiscing tristique risus. Purus non enim praesent elementum facilisis leo. Aliquet nec ullamcorper sit amet risus. Vulputate ut pharetra sit amet. <strong>Consectetur adipiscing elit duis tristique sollicitudin nibh sit amet.</strong>
		</p>

		<hr>

		<?php
			foreach($teamMembers as $member){
		?>
			<div class="member">
				<img src="img/<?php echo $member[img];?>.png" alt="<?php echo $member[name];?>">
				<h2><?php echo $member[name]; ?></h2>
				<p><?php echo $member[bio];?></p>
			</div><!-- member-->
			
		<?php
			}
		?>

	</div><!-- team-members -->

	<hr>

<?php
   include('includes/footer.php');
?>