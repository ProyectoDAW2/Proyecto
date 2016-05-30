function numAulaNumerico(numero){
	
	if (!/^([0-9])*$/.test(numero)){
		event.preventDefault();
		swal({
  	     	title: "",
  		 	text: "El n\u00FAmero de aula debe ser un n\u00FAmero",
  		 	type: "error",
  		 	confirmButtonText: "Aceptar"
  		});
	}
	else{
		if(!/^([0-9]{3})$/.test(numero)){
			event.preventDefault();
			swal({
	  	     	title: "",
	  		 	text: "El n\u00FAmero de aula debe tener 3 d\u00EDgitos",
	  		 	type: "error",
	  		 	confirmButtonText: "Aceptar"
	  		});
		}
	}
	
}

function validarDatosCrear(){
	var numero= document.getElementById("numeroAulaNueva").value;
	var nombre= document.getElementById("nombreAulaNueva").value;
	var categoria= document.getElementById("categoriaAulaNueva").value;
	var equipos= document.getElementById("equiposAulaNueva").value;
	var capacidad= document.getElementById("capacidadAulaNueva").value;
	
	var numeroCorrecto= false;
	var nombreCorrecto= false;
	var categoriaCorrecta= false;
	var equiposCorrecto=  false;
	var capacidadCorrecta= false;
	
	if(/^[0-9]{3}$/.test(numero)){
		numeroCorrecto= true;
	}
	
	if(/^([a-zA-Z ]|\d){3,30}$/.test(nombre)){
		nombreCorrecto= true;
	}
	
	if(/^[a-zA-Z ]{3,30}$/.test(categoria)){
		categoriaCorrecta= true;
	}
	
	if(/^[0-9]{1,3}$/.test(equipos)){
		equiposCorrecto= true;
	}
	
	if(/^[0-9]{1,3}$/.test(capacidad)){
		capacidadCorrecta= true;
	}
	
	if(numeroCorrecto && nombreCorrecto && categoriaCorrecta && equiposCorrecto && capacidadCorrecta){
		document.getElementById("resValidarCrear").value= true;
	}
	else{
		event.preventDefault();
		swal({
  	     	title: "Datos incorrectos",
  		 	text: "Por favor, revise los datos y vuelva a intentarlo.",
  		 	type: "error",
  		 	confirmButtonText: "Aceptar"
  		});
	}
}

function validarDatosModificar(){
	var numeroMod= document.getElementById("numAula").value;
	var nombreMod= document.getElementById("nombre").value;
	var categoriaMod= document.getElementById("categoria").value;
	var equiposMod= document.getElementById("equipos").value;
	var capacidadMod= document.getElementById("capacidad").value;
	
	var numeroCorrectoMod= false;
	var nombreCorrectoMod= false;
	var categoriaCorrectaMod= false;
	var equiposCorrectoMod=  false;
	var capacidadCorrectaMod= false;
	
	if(/^[0-9]{3}$/.test(numeroMod)){
		numeroCorrectoMod= true;
		alert("numeroSI");
	}
	
	if(/^([a-zA-Z ]|\d){3,30}$/.test(nombreMod)){
		nombreCorrectoMod= true;
		alert("nombreSI");
	}
	
	if(/^[a-zA-Z ]{3,30}$/.test(categoriaMod)){
		categoriaCorrectaMod= true;
		alert("categoriaSI");
	}
	
	if(/^[0-9]{1,3}$/.test(equiposMod)){
		equiposCorrectoMod= true;
		alert("equiposSI");
	}
	
	if(/^[0-9]{1,3}$/.test(capacidadMod)){
		capacidadCorrectaMod= true;
		alert("capacidadSI");
	}
	
	if(numeroCorrectoMod && nombreCorrectoMod && categoriaCorrectaMod && equiposCorrectoMod && capacidadCorrectaMod){
		document.getElementById("resModificar").value= true;
	}
	else{
		event.preventDefault();
		swal({
  	     	title: "Datos incorrectos",
  		 	text: "Por favor, revise los datos y vuelva a intentarlo.",
  		 	type: "error",
  		 	confirmButtonText: "Aceptar"
  		});
	}
}