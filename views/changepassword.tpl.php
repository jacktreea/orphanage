<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img src="assets/images/logo.png" height="54" alt="Porto Admin" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Change Password</h2>
					</div>
					
					<div class="panel-body">
						<form method="post" action="<?=url('changepassword','changeDefault')?>">

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">New Password</label>
									<!--<a href="pages-recover-password.html" class="pull-right">Lost Password?</a>-->
								</div>
								<div class="input-group input-group-icon">
									<input id="np" name="newpassword" type="password"  onFocus="this.select();" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>
							
							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Confirm Password</label>
									<!--<a href="pages-recover-password.html" class="pull-right">Lost Password?</a>-->
								</div>
								<div class="input-group input-group-icon">
									<input id="cp" name="password" type="password" value="<?=$password?>" onFocus="this.select();"  class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" onclick="return verify()" class="btn btn-primary hidden-xs">Reset</button>
									<button type="submit" onclick="return verify()" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Reset</button>
								</div>
							</div>

							<!--<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
							</span>


							<p class="text-center">Don't have an account yet? <a href="pages-signup.html">Sign Up!</a>
							-->
						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2015. All Rights Reserved.</p>
			</div>
		</section>
<script>
	function verify() {
		var nP = $('#np').val();
		var cP = $('#cp').val();
		
		if ( nP != cP ) {
			triggerError("Confirm Password Mismatch");
			$('#cp').focus();
			return false;
		}
		return true;
	}
	
</script>