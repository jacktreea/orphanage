<script>
	function verify(frm) {
		
		if ( frm.oldpword.value == "" ) {
			alert ("Please enter the old password");
			frm.oldpword.focus();
			return false;
		}
		if ( frm.newpword.value == "" ) {
			alert ("Please enter the new password");
			frm.newpword.focus();
			return false;
		}
		if ( frm.cnewpword.value == "" ) {
			alert ("Please confirm the new password");
			frm.cnewpword.focus();
			return false;
		}
		if ( frm.newpword.value != frm.cnewpword.value ) {
			alert ("New password does not match.");
			frm.cnewpword.focus();
			return false;
		}
		return true;
	}
</script>
<header class="page-header">
	<h2>Change Password</h2>
</header>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
					<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
				</div>
				
				<h2 class="panel-title">Change Existing Password</h2>
			</header>
			<div class="panel-body">
				<form class="form-horizontal form-bordered" method="post" action="<?=url('password','save')?>" onsubmit="return verify(this)">
					
					<div class="form-group">
						<label class="col-md-3 control-label" for="username">Username</label>
						<div class="col-md-6">
							<select name="username" class="form-control mb-md" id="username">
								<?php foreach ($users as $user) { 
									if ($user['id'] == $_SESSION['member']['id']) {?>
									<option value="<?php echo $user['id']; ?>" > <?php echo $user['username']; ?></option>
									<?php }
								} ?>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputOldPassword">Old Password</label>
						<div class="col-md-6">
							<input type="password" name="oldpword"  class="form-control" data-toggle="tooltip" data-trigger="hover" data-original-title="Enter current password" id="inputOldPassword">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputNewPassword">New Password</label>
						<div class="col-md-6">
							<input type="password" name="newpword" class="form-control" data-toggle="tooltip" data-trigger="hover" data-original-title="Enter new password" id="inputNewPassword">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputNewPasswordCon">New Password</label>
						<div class="col-md-6">
							<input type="password" name="cnewpword" class="form-control" data-toggle="tooltip" data-trigger="hover" data-original-title="Enter new password again" id="inputNewPasswordCon">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label" for="">Help Status</label>
						<div class="col-md-6">
							<input type="checkbox" class="form-control" name="helpStat" data-toggle="tooltip" data-trigger="hover" data-original-title="Get help notifications on page top" value="1" <?if ($userDa['help']) echo 'checked';?>>
						</div>
					</div>
					
					<div class="form-group">	
						<button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block">Change Password</button>
					</div>
				</form>
			</div>
		</section>
		
		
		
		
	</div>
</div>