<form class="form-horizontal" id="submit_gp_redirect"  action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
<fieldset>

<!-- Form Name -->
<legend>Setting</legend>

<!-- Text input-->

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="gp_redirect">Redirect Approval Post</label>
  <div class="col-md-4">
    <select id="gp_redirect" name="gp_redirect" class="form-control" required>
      <option disabled>Choose post</option>
     
	  
	    <?php 
			foreach ( $array_page  as $key => $title ) :?>
			  
				 <option value="<?=$key?>" <?=(($gp_redirect_link_default == $key)?"selected":"")?>><?=$title?></option>
			  
			<?php endforeach; ?>
    </select>
  </div>
  
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="gp_email">Email</label>  
  <div class="col-md-4">
  <input id="gp_email" name="gp_email" type="text" placeholder="email" class="form-control input-md" required value="<?=$gp_email_default?>">
 
  </div>
</div>

   <input type="hidden" name="action" value="gp_save_option">
   <input type="hidden" name="redirect" value="<?=$current_url?>">
  

   <button type="submit"class="btn btn-primary">Submit</button>
</form>