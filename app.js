$(document).ready(function(){

	$("#loginForm").bind("submit",function(){

		$.ajax({
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			data: $(this).serialize(),
			beforeSend:function(){
				$("loginForm button[type=submit]").html("enviando...");
				$("loginForm button[type=submit]").attr("disabled","disabled");
			},
			success:function(response){



				if(response.estado == "true"){
					$("body").overhang({
						type: "succes",
						message: "Conectado"
						callback: function(){
							window.location.href = "admin.php";
						}
					});
				}else{
					$("body").overhang({
						type: "error",
						message: "Usuario o Contraseña Incorrecta",
					});
				}

				$("loginForm button[type=submit]").html("ingresar");
				$("loginForm button[type=submit]").removeAttr("disabled");
			},
			error:function(){
				$("body").overhang({
					type: "error",
					message: "Usuario o Contraseña Incorrecta"
				});

				$("loginForm button[type=submit]").html("ingresar");
				$("loginForm button[type=submit]").removeAttr("disabled");
			}
		});

		return false;
	});

});