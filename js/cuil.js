const dni = document.getElementById("dni");
const sexo = document.getElementById("sexo");
const cuilHeading = document.getElementById("cuil");
const cuilInput = document.getElementById("inputCuil");

const calcularCuil = (sexo, dni) => {
  let baseCuil;
  
  if (sexo === "1") {
    sexo = 'M';
    baseCuil = 20;
  } else if (sexo === "2") {
    sexo = 'F';
    baseCuil = 27;
  }

  const cuilCalculado = `${baseCuil}${dni}${sexo}`;
return cuilCalculado;
};

window.addEventListener('load', function () {
  dni.addEventListener('input', function () {
    
    
if (this.value) {
     const cuilCalculado = calcularCuil(sexo.value, this.value);
      cuilHeading.innerText = cuilCalculado;
      cuilInput.value = cuilCalculado; // Actualizar el valor del input oculto
    }
  });

  sexo.addEventListener('change', function () {
    if (dni.value) {
       const cuilCalculado = calcularCuil(this.value, dni.value);
      cuilHeading.innerText = cuilCalculado;
      cuilInput.value = cuilCalculado; 
    }
  });
});

  