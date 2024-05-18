const mensajeError = document.getElementById('mensaje-error');
function buscarTaller() {
    // Obtener el valor de la cédula
    var tipo_taller = document.getElementById("tipo_taller").value;

    // Crear un objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

        // Si la respuesta es satisfactoria, mostrar los datos en el formulario
        var data = JSON.parse(this.responseText);
        mensajeError.classList.add('d-none');
        mensajeError.classList.remove('d-block');

        document.getElementById("talleres").value = data.nombre_taller;

        console.log(data);
       // document.getElementById("talleres_nombre_taller").value = data.nombre;
        } 
        else if (this.readyState == 4 && this.status == 404){
        var data = JSON.parse(this.responseText);
        // Si la respuesta no es satisfactoria, mostrar un mensaje de error 

        mensajeError.classList.add('d-block');
        mensajeError.classList.remove('d-none');
        mensajeError.textContent = data.error;


       // document.getElementById("nombre_taller").value = '';
        }
        };

        // Abrir la conexión con el servidor
        xhr.open("GET", "/obtenerTalleresPorTipo?tipo_taller=" +tipo_taller, true);


        // Enviar la solicitud al servidor
        xhr.send();
       }