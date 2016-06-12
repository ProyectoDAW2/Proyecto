function registrar()
        {
			
            var nickname= document.getElementById("nick").value;
            var pass= document.getElementById("password").value;
            var pass2= document.getElementById("password2").value;
            var email= document.getElementById("correo").value;
            
            var nickCorrecto=false;
            var passCorrecta= false;
            var pass2Correcta= false;
            var emailCorrecto= false;
            
            if(/^\w{3,30}$/.test(nickname))
            {
                nickCorrecto=true;
            }
            else{
            	event.prevenDefault();
            	document.getElementById("nick").focus();
            }
            
            if(/^(?=.*\d)(?=.*[a-zA-Z])(\W*).{6,10}$/.test(pass))
            {
                if(pass==pass2)
                {
                    passCorrecta=true;
                    pass2Correcta= true;
                }

            }
            
            if(/^\w+([\-_]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email))
            {
                emailCorrecto=true;
            }

            if(nickCorrecto && passCorrecta && pass2Correcta && emailCorrecto)
            {
				document.getElementById("res").value= true;
            } 
            else{
            	event.preventDefault();
            }
            
            
        }