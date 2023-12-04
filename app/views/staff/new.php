<div class="container mt-5" >
	<div class="row">
		<div class="col-lg-6">
			<?php Flasher::flash();?>
		</div>
	</div>
	<form action="<?= BASEURL;?>/staff/create" method="post" >
		<div class="mb-3">
		  <label for="username" class="form-label">Username</label>
		  <input type="text" class="form-control" id="username" name="username" placeholder="username" required="">
		</div>
		<div class="mb-3">
		  <label for="email" class="form-label">Email </label>
		  <input type="email" class="form-control" id="email" name="email" placeholder="email" required="">
		</div>
		<div class="mb-3">
		  <label for="password" class="form-label">Password</label>
		  <input type="password" class="form-control" id="password" name="password" placeholder="username" required="">
		</div>
		<div class="mb-3">
		  <label for="confirmPassword" class="form-label">Confirmation Password</label>
		  <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirmation Password" required="">
		</div>
		<div class="mb-3">
		  <button class="btn btn-primary" type="submit">Create Account</button>
		</div>
	</form>
	<a href="<?= BASEURL;?>/staff/login">Log in</a>
</div>