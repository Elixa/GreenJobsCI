// JavaScript Document
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

  	$(document).ready(function(){	
		// Borrar un pinteo
		$('.elimina').live("click",function(){
			var ID = $(this).attr("id");
						var C = $(this).parents("tr").find("td").eq(0).html();//Captura
						respuesta = confirm("Realmente deseas eliminar este pinteo: " + C);
						if (respuesta){
							$(this).parents("li").fadeOut("normal", function(){
								$(this).remove();
								alert("Pinteo eliminado! =)");
								
									//instanciamos el objetoAjax
									ajax=objetoAjax();
									ajax.open("GET","include/jsdel.php?n="+C,true);//Donde lo mandara
									ajax.send(null)							
								//
								
							})
						}
			return false;
		});

		/*$('.comentar').live("click",function(){
			var ID = $(this).attr("id");
						var C = $(this).parents("tr").find("td").eq(0).html();//Captura
						respuesta = confirm("Realmente deseas eliminar este pinteo: " + C);
						if (respuesta){
							$(this).parents("li").fadeOut("normal", function(){
								$(this).remove();
								alert("Pinteo eliminado! =)");
								
									//instanciamos el objetoAjax
									ajax=objetoAjax();
									ajax.open("GET","include/jsdel.php?n="+C,true);//Donde lo mandara
									ajax.send(null)							
								//
								
							})
						}
			return false;
		});*/

	
		
    }); 




































				
            function fn_dar_eliminar(){
                $("a.eliminar").click(function(){
					var C = $(this).parents("tr").find("td").eq(0).html();//Captura
                    respuesta = confirm("Realmente deseas eliminar este pinteo:" + C);
                    if (respuesta){
                        $(this).parents("li").fadeOut("normal", function(){
                            $(this).remove();
                            alert("Pinteo eliminado! =)");
							
								//instanciamos el objetoAjax
								ajax=objetoAjax();
								ajax.open("GET","include/jsdel.php?n="+C,true);//Donde lo mandara
								ajax.send(null)							
							//
							
						})
                    }
                });
            };
			
			
			

