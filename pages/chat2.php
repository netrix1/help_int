<style type="text/css">
.mb-4, .my-4 {
	margin-bottom: 0rem!important;
}

.border-bottom {
	border-bottom: 1px solid #dee2e6!important;
}
.breadcrumb{
	margin-bottom: 0rem !important;
}
.card-footer {
	padding: .75rem 1.25rem .75rem 0rem;
}
.status-user-notification {
	-moz-border-radius: 50%;
	-webkit-border-radius: 50%;
	border-radius: 50%;
	-moz-background-clip: padding-box;
	-webkit-background-clip: padding-box;
	background-clip: padding-box;
	border: 2px solid #fff;
	color: #fefefe;
	font: normal 0.85em 'Lato';
	height: 15px;
	line-height: 1.75em;
	position: relative;
	right: 25px;
	text-align: center;
	top: 22px;
	width: 15px;
	content: "";
}
.status-user-offline{
	background: #db3434;
}
.status-user-online{
	background: #24c13f;
}
</style>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.css" />
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>


<div class="row no-gutters"> <!-- row -->
	<div class="col-sm-12 col-md-6 col-lg-4 bg-white border-right" style="min-height: calc(100vh - 94px);"> <!-- col -->
		<div class="card flat">
			<?php /*
			<div class="card-header h-60px">
				<div class="form-group form-group-icon m-0">
					<input type="text" id-search="input-search-list" data-search="list-group-search" class="form-control form-control-sm cs-form rounded" placeholder="Search...">
					<span class="material-icons form-icon">search</span>
				</div>
			</div>

				<div class="list-search-not-found p-3">    min-height: 87.8vh;</div>*/ ?>
				<div id="user_details"></div>
				
		</div>
	</div> <!-- end col -->
	<div class="col-sm-12 col-md-6 col-lg-8 bg-white"> <!-- col -->
		<div class="card flat">
			<div id="user_model_details"></div>
		</div>
	</div> <!-- end col -->

	<script>  
	$(document).ready(function(){

		fetch_user();

		setInterval(function(){
			update_last_activity();
			fetch_user();
			update_chat_history_data();
			fetch_group_chat_history();
		}, 3000);

		function fetch_user()
		{
			$.ajax({
				url:"../c3/fetch_user.php",
				method:"POST",
				success:function(data){
					$('#user_details').html(data);
				}
			})
		}

		function update_last_activity()
		{
			$.ajax({
				url:"../c3/update_last_activity.php",
				success:function()
				{

				}
			})
		}

		function make_chat_dialog_box(to_user_id, to_user_name)
		{
			var
			modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
			modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
			modal_content += fetch_user_chat_history(to_user_id);
			modal_content += '</div>';
			modal_content += '<div class="form-group">';
			modal_content += '<input name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"/>';
			modal_content += '</div><div class="form-group" align="right">';
			modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
			$('#user_model_details').html(modal_content);
		}

		$(document).on('click', '.start_chat', function(){

			var to_user_id = $(this).data('touserid');
			var to_user_name = $(this).data('tousername');
			make_chat_dialog_box(to_user_id, to_user_name);
			/*$("#user_dialog_"+to_user_id).dialog({
				autoOpen:false,
				width:400
			});
			$('#user_dialog_'+to_user_id).dialog('open');
			$('#chat_message_'+to_user_id).emojioneArea({
				pickerPosition:"top",
				toneStyle: "bullet"
			});*/
		});
		/*$(document).on('keydown', function () {
		if (event.keyCode !== 13) return;*/
		//$('.chat_message').on('keydown', function (event) { // também pode usar keyup
		//	if (event.keyCode === 13) {

		$(document).on('click', '.send_chat', function(){
			var to_user_id = $(this).attr('id');
			var chat_message = $('#chat_message_'+to_user_id).val();
			$.ajax({
				url:"../c3/insert_chat.php",
				method:"POST",
				data:{to_user_id:to_user_id, chat_message:chat_message},
				success:function(data)
				{
					//$('#chat_message_'+to_user_id).val('');
					var element = $('#chat_message_'+to_user_id).emojioneArea();
					element[0].emojioneArea.setText('');
					$('#chat_history_'+to_user_id).html(data);
				}
			})
		
		});

		function fetch_user_chat_history(to_user_id)
		{
			$.ajax({
				url:"../c3/fetch_user_chat_history.php",
				method:"POST",
				data:{to_user_id:to_user_id},
				success:function(data){
					$('#chat_history_'+to_user_id).html(data);
				}
			})
		}

		function update_chat_history_data()
		{
			$('.chat_history').each(function(){
				var to_user_id = $(this).data('touserid');
				fetch_user_chat_history(to_user_id);
			});
		}

		$(document).on('click', '.ui-button-icon', function(){
			$('.user_dialog').dialog('destroy').remove();
			$('#is_active_group_chat_window').val('no');
		});

		$(document).on('focus', '.chat_message', function(){
			var is_type = 'yes';
			$.ajax({
				url:"../c3/update_is_type_status.php",
				method:"POST",
				data:{is_type:is_type},
				success:function()
				{

				}
			})
		});

		$(document).on('blur', '.chat_message', function(){
			var is_type = 'no';
			$.ajax({
				url:"../c3/update_is_type_status.php",
				method:"POST",
				data:{is_type:is_type},
				success:function()
				{
					
				}
			})
		});

		$('#group_chat_dialog').dialog({
			autoOpen:false,
			width:400
		});

		$('#group_chat').click(function(){
			$('#group_chat_dialog').dialog('open');
			$('#is_active_group_chat_window').val('yes');
			fetch_group_chat_history();
		});

		$('#send_group_chat').click(function(){
			var chat_message = $('#group_chat_message').html();
			var action = 'insert_data';
			if(chat_message != '')
			{
				$.ajax({
					url:"../c3/group_chat.php",
					method:"POST",
					data:{chat_message:chat_message, action:action},
					success:function(data){
						$('#group_chat_message').html('');
						$('#group_chat_history').html(data);
					}
				})
			}
		});

		function fetch_group_chat_history()
		{
			var group_chat_dialog_active = $('#is_active_group_chat_window').val();
			var action = "fetch_data";
			if(group_chat_dialog_active == 'yes')
			{
				$.ajax({
					url:"../c3/group_chat.php",
					method:"POST",
					data:{action:action},
					success:function(data)
					{
						$('#group_chat_history').html(data);
					}
				})
			}
		}

		$('#uploadFile').on('change', function(){
			$('#uploadImage').ajaxSubmit({
				target: "#group_chat_message",
				resetForm: true
			});
		});
		
	});  
	</script>
</div> <!-- end row -->