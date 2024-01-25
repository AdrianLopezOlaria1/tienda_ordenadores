
var dineroGastado = 0;
var contadorElement = document.getElementById("contador");


function anyadirAlCarrito(precio) {
    let nombre = sacarnombre(precio);
    

    var xhr = new XMLHttpRequest();
    var url = "tienda.php";

    xhr.open("POST", url, true);
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Mostrar la respuesta en el elemento con id "resultado"
            dineroGastado += precio;
    actualizarContador();
            if ('Notification' in window) {
                Notification.requestPermission().then(function (permission) {
                    if (permission === 'granted') {
                        let notificacion = new Notification('Producto añadido al carrito', {
                            body: 'Se ha añadido un producto al carrito. Nuevo total: $' + dineroGastado.toFixed(2),
                            icon: '../img/icono.ico'  // Puedes incluir una ruta a un ícono opcional
                        });
                    }
                });
            }
        }
    }; 

    // Enviar los datos como formulario
    xhr.send("nombre=" + nombre + "&precio=" + precio);
    // document.getElementById("insertarContacto").innerHTML = this.responseText;
}




function quitarDelCarrito(precio) {
    if (dineroGastado <= 0 || dineroGastado - precio <0) {
        alert("El carrito está vacío. No hay elementos para quitar.");
       
    }else{
        dineroGastado -= precio;
        actualizarContador();
    }

    
}

function actualizarContador() {
    contadorElement.innerHTML = "Total:<span class='verde'> " + dineroGastado.toFixed(2) + "€</span>";
    
    
}

function sacarnombre(precio){
    switch (precio) {
        case 779.50:
          return 'PcCom_Ready_Intel'
          break;
        case 749.00:
            return '"Medion Erazer Engineer P10"'
            break;
        case 419.99:
            return 'HP%20%15S-eq2126ns'
          break;
          case 489.00:
            return 'PcCom%20%Lite'
          break;
          case 600.00:
            return 'PcCOm Imperial'
          break;
          case 799.99:
            return 'MSI THin GF63'
          break;
          case 950.00:
            return 'ASUS TUF Gaming F15'
          break;
          case 788.99:
            return 'Arizone Raijin'
          break;
          case 788.99:
            return 'Asus 15DX30'
          break;
        default:
            return 'ERROR'
          break;
      }
      
}