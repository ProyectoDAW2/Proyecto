function modify(){
            var nickname= document.getElementById("nick").value;
            var pass= document.getElementById("passwordNueva").value;
            var pass2= document.getElementById("password2").value;
            var email= document.getElementById("correo").value;
            
            var nickCorrecto=false;
            var passCorrecta= false;
            var emailCorrecto= false;

            var nickVacio= false;
            var passVacia= false;
            var emailVacio= false;
            
            if(/^\w{3,30}$/.test(nickname)){
                nickCorrecto=true;
            }
            if(nickname=="" || nickname==null){
				nickVacio= true;
            }
            if(/^(?=.*\d)(?=.*[a-zA-Z])(\W*).{6,10}$/.test(pass)){
                if(pass==pass2){
                    passCorrecta=true;
                }
            }
            if(pass=="" || pass==null){
				passVacia= true;
            }
            if(/^\w+([\-_]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email)){
                emailCorrecto=true;
            }
            if(email=="" || email==null){
				emailVacio= true;
            }  
            if(nickCorrecto && passCorrecta && emailCorrecto){
				document.getElementById("res").value= true;
            }   
            else if(nickVacio || passVacia || emailVacio){
				document.getElementById("res").value= true;
				if(emailVacio){
					document.getElementById("res").value= "noCorreo";
				}
            }
            else{
				document.getElementById("res").value= false;
            }
        }