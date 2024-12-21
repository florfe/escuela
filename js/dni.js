const nombreapellido = document.getElementById("docentes");
const dni = document.getElementById("numeroDni");



	

window.addEventListener('load', function() {
	docentes.addEventListener('change',  function() {
	if(this.value){
edad.innerText = calcularDni(this.value);
	}

	});
});