
  <?php 
  	foreach ($sidebar as $key => $value) {
  		echo "<a href='$url[$key]' class='list-group-item list-group-item-action'>$value</a>";
  	}
   ?>

   <div class="mt-5">
	<?php 
				//lecture details
	$L_name = "Stacy";
	$L_Email = "stacy@gamil.com";
	$L_PhoneNumber = "+601236152221";
	?>
	<li class="list-group-item active bg-dark btn-outline-dark"><label class="font-weight-bold pr-3">TUTOR'S DETAILS</label></li>
	<?php 
	if(1){
		echo "
		<li class='list-group-item'><label class='font-weight-bold pr-3'>Name:</label>$L_name</li>
		<li class='list-group-item'><label class='font-weight-bold pr-3'>Email:</label>$L_Email</li>
		<li class='list-group-item'><label class='font-weight-bold pr-3'>Subject:</label>$L_PhoneNumber</li>
		";
	}else{
		echo "<li class='list-group-item'><label class='font-weight-bold pr-3'>Unassigned</li>";
	}
	?>
</div>
