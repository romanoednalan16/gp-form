jQuery(document).ready(function($){
	/*   */ 
	 
	 
	 
	  jQuery("form#submit_new_post").submit( function(e) {
		  e.preventDefault(); 
		  jQuery.ajax({
			 type : "post",
			 dataType : "json",
			 url : ajax_submit_post.ajaxurl,
			 data :jQuery("form.form-horizontal").serialize(),
			 success: function(response) {
				 console.log(response);
				 
				 if(response.success == true)swal("Success!", "You success requesting create your post!", "success");jQuery("form#submit_new_post").trigger('reset');
				 
				 
			 }
		  })      

	})
	 
})  