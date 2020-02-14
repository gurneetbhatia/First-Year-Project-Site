<?php

include('login.html');




?>

<!-- Trigger/Open The Modal -->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <form class="modal-form">
	  <div class="modal-content">
	    <span class="close">&times;</span>
	    <h2>Enter Pin</h2>
	    <label for="email"><b>Email</b></label>
	    <input type="text" placeholder="Enter Email" name="email" required>
	    <label for="psw"><b>Pin</b></label>
	    <input type="password" placeholder="Enter Pin" name="psw" required>
	    <button type="submit" class="btn">Enter</button>
	  </div>
	</form>
</div>

<!--<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Login</h1>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Pin</b></label>
    <input type="password" placeholder="Enter Pin" name="psw" required>

    <button type="submit" class="btn">Enter</button>
    <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>-->