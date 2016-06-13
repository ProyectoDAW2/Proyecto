function modify(){
	var nickname= document.getElementById("nick").value;
	var passActual= document.getElementById("passwordActual").value;
	var pass= document.getElementById("passwordNueva").value;
	var pass2= document.getElementById("passwordNueva2").value;
	var email= document.getElementById("correo").value;
              
	var nickCorrecto=false;
	var passCorrecta= false;
	var pass2Correcta= false;
	var emailCorrecto= false;
  
	var nickVacio= false;
	var passVacia= false;
	var pass2Vacia= false;
	var emailVacio= false;
              
	if(/^[a-zA-Z0-9 ]{3,30}$/.test(nickname)){
		nickCorrecto=true;
    }
    if(nickname=="" || nickname==null){
		nickVacio= true;
    }
              
	if(/^(?=.*\d)(?=.*[a-zA-Z])(\W*).{6,10}$/.test(pass)){
		if(pass==pass2){
			passCorrecta= true;
			pass2Correcta= true;
		}
	}
             
	if(pass=="" || pass==null){
		passVacia= true;
		pass2Vacia= true;
	}

             
	if(/^\w+([\-_]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email)){
		emailCorrecto=true;
	}
             
	if(email=="" || email==null){
		emailVacio= true;
	}  
             
	if(nickCorrecto && passCorrecta && pass2Correcta && emailCorrecto){
		document.getElementById("res").value= true;
	}   
	else if(nickVacio || passVacia || pass2Vacia || emailVacio){
		document.getElementById("res").value= true;
		if(emailVacio){
			document.getElementById("res").value= "noCorreo";
		}
	}
	else{
		document.getElementById("res").value= false;
		event.preventDefault();
	}

}

/*$("#nick").keyup(function(){
	var nickname= $("#nick").val();
	if(/^[a-zA-Z0-9 ]{3,30}$/.test(nickname)){
		
	}
	else{
		$("#nick").focus();
		event.preventDefault();
	}
});

$("#passwordNueva").keyup(function(){
	var pass= $("#passwordNueva").val();
	if(/^(?=.*\d)(?=.*[a-zA-Z])(\W*).{6,10}$/.test(pass)){
		
	}
	else{
		$("#passwordNueva").focus();
		event.preventDefault();
	}
});

$("#passwordNueva2").keyup(function(){
	var pass= $("#passwordNueva").val();
	var pass2= $("#passwordNueva2").val();
	if(pass==pass2){
		
	}
	else{
		$("#passwordNueva2").focus();
		event.preventDefault();
	}
});

$("#correo").keyup(function(){
	var email= $("#correo").val();
	if(/^\w+([\-_]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email)){
		
	}
	else{
		$("#correo").focus();
		event.preventDefault();
	}
});
*/