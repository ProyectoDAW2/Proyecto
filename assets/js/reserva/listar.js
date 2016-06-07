function datosUsuario(dato){
	
	if ((!/^([A-Za-z] )*$/.test(dato))||(/^\w+([\-_]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(dato))){
		event.preventDefault();
		swal({
  	     	title: "",
  		 	text: "Debe introducir un nombre, un nick o un correo",
  		 	type: "error",
  		 	confirmButtonText: "Aceptar"
  		});
	}
	
	
}




