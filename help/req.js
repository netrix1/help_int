$('document').ready(function(){
 
	$("#btn-login").click(function(){
		var data = $("#login-form").serialize();
			
		$.ajax({
			type : 'POST',
			url  : 'login.php',
			data : data,
			dataType: 'json',
			beforeSend: function()
			{	
				$("#btn-login").html('Logando...');
			},
			success :  function(response){						
				if(response.codigo == "1"){	
					$("#btn-login").html('Logar');
					$("#login-alert").css('display', 'none')
					window.location.href = "index.php";
				}
				else{			
					$("#btn-login").html('Logar');
					$("#login-alert").css('display', 'block !important')
					$("#mensagem").html(response.mensagem);
				}
		    }
		});
	});
 
});