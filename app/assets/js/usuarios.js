

function CargaData(data) {
    console.log(data);
    document.getElementById("nombre").setAttribute("value", data.name);
    document.getElementById("rut").setAttribute("value", data.rut);
    document.getElementById("email").setAttribute("value", data.email);
    document.getElementById("telefono").setAttribute("value", data.phone);
    document.getElementById("direccion").setAttribute("value", data.address);
    
    document.getElementById("action").setAttribute("value", "edit");
    document.getElementById("id").setAttribute("value", data.id);
}

var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

function imprimir() {
    // Obtén la sección que deseas imprimir por su ID o clase
    var seccionParaImprimir = document.getElementById('miTabla'); // Reemplaza 'id-de-tu-seccion' con el ID o clase de tu sección
    var logo = document.getElementById('logoreporte'); // Reemplaza 'id-de-tu-seccion' con el ID o clase de tu sección
    //mostrar logo:
    logo.style.display = 'block';
    if (seccionParaImprimir) {
        // Oculta otros elementos que no deseas imprimir
        var elementosOcultos = document.querySelectorAll('.excluir');
        console.log(elementosOcultos);
        elementosOcultos.forEach(function(elemento) {
            elemento.style.display = 'none';
        });

        // Imprime la sección
        window.print();

        // Restaura la visibilidad de los elementos ocultos
        elementosOcultos.forEach(function(elemento) {
            elemento.style.display = '';
            //document.getElementById('excluir').style.display = '';
        });
        logo.style.display = 'none';
    } else {
        console.log('Sección no encontrada');
    }
};