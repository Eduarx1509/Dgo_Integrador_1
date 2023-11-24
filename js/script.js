document.addEventListener("DOMContentLoaded", function () {
    let slider = document.querySelector(".slider-contenedor");
    let sliderIndividual = document.querySelectorAll(".contenido-slider");
    let contador = 1;
    let width = sliderIndividual[0].clientWidth;
    let intervalo = 5000;
 
    window.addEventListener("resize", function () {
       width = sliderIndividual[0].clientWidth;
    });
 
    setInterval(function () {
       slides();
    }, intervalo);
 
    function slides() {
       slider.style.transform = "translate(" + (-width * contador) + "px)";
       slider.style.transition = "transform .5s";
       contador++;
 
       if (contador == sliderIndividual.length) {
          setTimeout(function () {
             slider.style.transform = "translate(0px)";
             slider.style.transition = "transform 0s";
             contador = 1;
          }, 1500);
       }
    }
 
    const menuItems = document.querySelectorAll(".contenido .menu .subrayado");
    const restaurantes = document.querySelectorAll(".restaurante");
 
    menuItems.forEach((menuItem) => {
       menuItem.addEventListener("click", (event) => {
          event.preventDefault();
          const selectedClass = menuItem.textContent.toLowerCase();
          const mensaje = document.getElementById("mensaje");
          if (selectedClass === "todos") {
             mensaje.textContent = "Hola, elige el restaurante de tu preferencia.";
          } else {
             mensaje.textContent = `Estos son los restaurantes con ${selectedClass}.`;
          }
          restaurantes.forEach((restaurante) => {
             restaurante.style.display = "none";
          });
          const selectedRestaurantes = document.querySelectorAll("." + selectedClass);
          selectedRestaurantes.forEach((restaurante) => {
             restaurante.style.display = "block";
          });
       });
    });
 
    function realizarBusqueda() {
       const inputBusqueda = document.getElementById("busqueda").value.toLowerCase();
       const mensaje = document.getElementById("mensaje");
       const restaurantes = document.querySelectorAll(".restaurante");
 
       restaurantes.forEach((restaurante) => {
          const categoria = restaurante.className.toLowerCase();
          const nombre = restaurante.querySelector("h2").textContent.toLowerCase();
 
          if (categoria.includes(inputBusqueda) || nombre.includes(inputBusqueda)) {
             restaurante.style.display = "block";
          } else {
             restaurante.style.display = "none";
          }
       });
 
       if (inputBusqueda) {
          mensaje.textContent = `Resultados para: "${inputBusqueda}"`;
       } else {
          mensaje.textContent = "Hola, elige el restaurante de tu preferencia.";
       }
    }
 
    // Funciones del Carrito
    var agregarCarritoButtons = document.querySelectorAll('.agregar-carrito-btn');
 
    agregarCarritoButtons.forEach(function (button) {
       button.addEventListener('click', function () {
          var codigoProducto = this.parentElement.querySelector('input[name="codigo_producto"]').value;
          agregarAlCarrito(codigoProducto);
       });
    });
 
    function agregarAlCarrito(codigoProducto) {
        console.log('Producto agregado al carrito:', codigoProducto);
     
        // Obtener el carrito y la lista
        var carrito = document.getElementById('carrito');
        var listaCarrito = document.getElementById('lista-carrito');
     
        // Crear un nuevo elemento li
        var nuevoItemCarrito = document.createElement('li');
     
        // Puedes personalizar esto con la información real del producto
        nuevoItemCarrito.textContent = 'Producto ' + codigoProducto;
     
        // Agregar el nuevo elemento a la lista
        listaCarrito.appendChild(nuevoItemCarrito);
     
        // Mostrar el carrito
        carrito.style.display = 'block';
     }
     
 });
 