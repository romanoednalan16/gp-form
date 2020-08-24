<form class="form-horizontal" id="submit_new_post">
<fieldset>

<!-- Form Name -->
<legend>Post Form</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Title</label>  
  <div class="col-md-4">
  <input id="title" name="title" type="text" placeholder="Title" class="form-control input-md" required>
 
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="postype">Post Type</label>
  <div class="col-md-4">
    <select id="postype" name="postype" class="form-control" required>
      <option disabled>Choose post</option>
     
	  
	    <?php 
			foreach ( $post_types  as $key => $post_type ) :?>
			  
				 <option value="<?=$key?>"><?=$post_type?></option>
			  
			<?php endforeach; ?>
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Description">Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="Description" name="Description"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="excerpt">excerpt</label>  
  <div class="col-md-4">
  <input id="excerpt" name="excerpt" type="text" placeholder="excerpt" class="form-control input-md">
  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="featureimage">Feature Image</label>
  <div class="col-md-4">
   <input id="featureimage" name="featureimage" type="hidden" class="form-control input-md" required="">
    <button type="button" id="featureimage" class="btn btn-primary">Select</button>
  </div>
</div>

</fieldset>

   <input type="hidden" name="action" value="gp_create_post">
   <input type="hidden" name="redirect" value="<?=strtok($_SERVER["REQUEST_URI"], '?')?>">
  
    <input type="hidden" name="nonce" value="<?=$nonce?>">
   <button type="submit"class="btn btn-primary">Submit</button>
</form>