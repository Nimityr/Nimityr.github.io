var socket=null;
var url = "http://localhost:3000";
$(function() {
	$('#out').on('click',()=>{
		if (socket)	{
			/* completer */
					}
	});

	$("#espace_chat").hide();
	$("#nom").focus();

	$("#form_auth").on("submit",event=>{
		event.preventDefault();	
		socket = io.connect(url);
		if (socket){
			$("#nom").prop('readonly', true);
			$("#button_nom").prop('disabled', true);
			/* à completer */
		}
	});

	$("#form").on("submit",e=>{

		e.preventDefault();
		socket.emit('message',{
			"m": $("#message").val()
		});
		$("#message").val('');
	});


});
