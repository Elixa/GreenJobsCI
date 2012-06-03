function xmlhttp(){
		var xmlhttp;
		try{xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");}
		catch(e){
			try{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
			catch(e){
				try{xmlhttp = new XMLHttpRequest();}
				catch(e){
					xmlhttp = false;
				}
			}
		}
		if (!xmlhttp) 
				return null;
			else
				return xmlhttp;
	}
							function redireccionar(){ 
							  
							}  
function login(){
		var A = document.getElementById('result');
		var B = document.getElementById('loading');
		var C = document.getElementById('name').value;
		var D = document.getElementById('pass').value;
		var E;
		
		var ajax = xmlhttp();

		ajax.onreadystatechange=function(){
				if(ajax.readyState==1){
						B.innerHTML = "Iniciando <img src='style/images/loading.gif' alg='Loading...'>";					
					}					
				if(ajax.readyState==4){
						A.innerHTML = ajax.responseText;
						B.innerHTML = "";
													
					}
			}
		ajax.open("GET","include/login1.php?a="+C+"&b="+D,true);
		ajax.send(null);
		return false;
	}