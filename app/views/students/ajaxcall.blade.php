<?php
		   //Adding Comment By Ajax Call
		   $(".col-md-8").on("click","#add_comment",function(){
		   		var add = $('#comment').val();
		   		var project_id = $(this).attr('data-project-id');
		   		$.ajax({
		   			url: "{{URL::to('/createcomment')}}/"+project_id,
		   			type: "POST",
		   			data: {
		   				comment : add
		   			},
		   			async :false,
		   			success: function(msg){
		   				if(msg == "false"){
		   					return;
		   				}
		   				$('.commentList').prepend(msg);
		   				$('#comment').val("");
		   			}
		   		});
				return false;
		   });
		   //End of Ajax