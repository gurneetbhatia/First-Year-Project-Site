<?php

include('login.php');



?>

<!-- Trigger/Open The Modal -->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <form action="confirm_pin.php" method="POST" class="modal-form">
	  <div class="modal-content">
	    <span id="close" class="close">&times;</span>
	    <h2>Enter Pin</h2>
	    <label for="email"><b>Email</b></label>
	    <input type="text" placeholder="Enter Email" name="email" id='email' required>
	    <label for="psw"><b>Pin</b></label>
	    <input type="password" placeholder="Enter Pin" name="psw" id='psw' required>
	    <button type="submit" class="btn">Enter</button>
	  </div>
	</form>
</div>

<script type="text/javascript">
	var modal = document.getElementById("myModal");
	var close = document.getElementById("close");
	console.log(modal);
	window.onclick = function(event) {
		if (event.target == modal) {
			window.location = "login.php";
		}
		else if (event.target == close) {
			window.location = "login.php";
		}
	}
</script>
