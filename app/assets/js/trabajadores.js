function CargaData(data){
    console.log(data);
    document.getElementById("rut").value = data.worker_rut;
    document.getElementById("nombre").value = data.worker_nombre;
    document.getElementById("cargo").value = data.worker_cargo;
    document.getElementById("action").setAttribute("value", "edit");
    document.getElementById("id").setAttribute("value", data.worker_id);

    console.log(data.worker_id);
    
}