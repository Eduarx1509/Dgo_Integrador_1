<?php
session_start();
require('./fpdf.php');
$correo = $_SESSION['usuario'];

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
      $this->Image('logo.png', 185, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode("Bienvenido a reporte D'GO"), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(8); // Salto de línea
      $this->SetTextColor(103); //color
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }

   function AddTextoBienvenida() {
      $texto = "Bienvenido a nuestra plataforma de pedidos en línea. En D'GO, estamos aquí para simplificar tu experiencia culinaria. Descubre una amplia variedad de restaurantes y sabores en un solo lugar.\n\n";
      $texto .= "Explora: Navega por nuestra selección de restaurantes asociados y descubre una diversidad de opciones gastronómicas. Desde platos locales hasta tus cadenas favoritas, hay algo para cada antojo.\n\n";
      $texto .= "Pedidos Fáciles: Realiza tus pedidos de manera rápida y sencilla. Selecciona tus platos favoritos, personaliza tus preferencias y completa tu pedido con unos pocos clics.\n\n";
      $texto .= "Entrega Rápida: Nos comprometemos a llevarte la comida caliente y deliciosa en el menor tiempo posible. Nuestro equipo está dedicado a brindarte una experiencia de entrega rápida y confiable.\n\n";
      $texto .= "Promociones y Descuentos: Mantente al tanto de nuestras promociones exclusivas y descuentos especiales. Aprovecha las ofertas y ahorra en tus pedidos favoritos!\n\n";
      $texto .= "Gracias por elegir D'GO para satisfacer tus antojos! Estamos aquí para hacer que tu experiencia de pedidos de comida sea rápida, fácil y deliciosa.";
      // Reemplazar los caracteres acentuados por sus equivalentes sin acento
      $texto = strtr($texto, [
         'á' => 'a',
         'é' => 'e',
         'í' => 'i',
         'ó' => 'o',
         'ú' => 'u',
         'Á' => 'A',
         'É' => 'E',
         'Í' => 'I',
         'Ó' => 'O',
         'Ú' => 'U',
         'ñ' => 'n',
         'Ñ' => 'N',
      ]);

      $this->SetFont('Arial', '', 12);
      $this->MultiCell(0, 6, $texto);
      $this->Ln(5);
   }
}

include ('../Conexion.php');
$obj=new Conexion();
$consulta_info = $obj->conecta()->query("SELECT nombre, apellido FROM cliente where correo = '$correo'");

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas
$pdf->AddTextoBienvenida();

while ($data=$consulta_info->fetch_assoc()) {
   $nombre = $data['nombre'];
   $apellido = $data['apellido'];
}

$pdf->SetFont('Arial', '', 16);
$pdf->Cell(0, 10, 'Datos del cliente', 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Nombre: '.$nombre, 0, 1);
$pdf->Cell(0, 10, 'Apellido: '.$apellido, 0, 1);
$pdf->Cell(0, 10, 'Correo: '.$correo, 0, 1);
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(0, 10, 'Lista de productos pedidos', 0, 1);
$pdf->SetFont('Arial', '', 12);

include('../carrito2.php');
$carrito = new Carrito();
$totalCarrito = $carrito->obtenerTotal();
$productosEnCarrito = $carrito->obtenerProductosEnCarrito();

foreach ($productosEnCarrito as $producto) : 
   $pdf->Cell(0, 10, utf8_decode($producto['nombre']).'('.$producto['cantidad'].')'.'...........S/'. $producto['precio'], 0, 1);
endforeach;

$pdf->Cell(0, 10, 'El total a pagar es: S/'. $totalCarrito, 0, 1);

$pdf->SetFont('Arial', '', 16);
$pdf->Cell(0, 10, 'Tiempo estimado de entrega: 30 min', 0, 1);

$pdf->Output('Prueba.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)*/
