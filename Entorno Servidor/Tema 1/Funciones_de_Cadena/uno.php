<?php
//Longitud de una cadena
$cadena = "Hola Mundo";
echo "<br>";
echo strlen($cadena); //Longitud de la cadena
echo "<br>";
//Buscar en cadenas strstr y stristr (no case sensitive)
$cadena = "usuario@correo.es";
echo strstr($cadena, "@"); //Devuelve desde @ hasta el final (@correo.es)
echo "<br>";
echo strstr($cadena, "@", true); //Devuelve desde @ hasta el principio de cadena (usuario)
$cadena = "holA_mundo";
echo "<br>";
echo "Valor: ". strstr($cadena, "a"); //Vacio
echo "<br>";
echo "Valor: ". stristr($cadena, "a"); //A_mundo
//strpos(cad1, cad2, [desplazamiento = 0]) primera pos de cad 2 en cad1 
//strrpos lo mismo pero la ult posicion
$cadena = "Micorreo@.es@Hola";
echo "<br>";
echo "La primera pos de @ es: ". strpos($cadena, '@');
echo "<br>";
echo "La ultima pos de @ es: ". strrpos($cadena, '@');
//----------strspn encuentra la longitud de la subcadena
$cadena = "1942 fue un gran año";
echo "<br>";
echo strspn($cadena, "0123456789");
//strcspn la longitud mas larga que NO esta en la mascara
$micorreo = "correo.masdatos@nombre.es";
echo "<br>";
echo strcspn($micorreo, "@");
$mascara = " abcdefghijklmnopqrstuvwxyz";
$cadenaB = "Solo tengo letras";
$cadenaM = "Tengo un poco2 de # todo";
if (strspn($cadenaM, $mascara)) {
    echo "<br> La cadena solo tiene letras";
} else {
    echo "<br> La cadena tiene mas a parte de letras";
}
//Comparando cadenas
$cad1 = "Manolo";
$cad2 = "Juan";
if ($cad1 == $cad2) {
    # code...
}
//El operador === comprueba valor y tipo
$a = 5;
$b = "5";
echo "<br>";
echo ($a===$b) ? "Los valores son iguales" : "No son iguales";

//strcmp(cad1, cad2)
$cad1 = "abelardo";
$cad2 = "Zacarias";
echo "<br>";
echo strcmp($cad1, $cad2);
echo "<br>";
echo strcmp($cad2, $cad1);
echo "<br>";
echo strcmp($cad1, $cad1);
//strcasecmp NO case sensitive
echo "<br>";
echo strcasecmp($cad1, $cad2);
echo "<br>";
echo strcasecmp($cad2, $cad1);
echo "<br>";
echo strcasecmp($cad1, $cad1);
//strmatcpm strmatcasecpm lo mismo pero el orden es natural
//Operar con subcadenas
//substr(cad, inicio, fin)
$cadena = "Hola Mundo, es Viernes";
echo "<br>";
echo substr($cadena, 0 , 6);
echo "<br>";
echo substr($cadena, 1 , 6);
$cad = "_*formato de datos";
echo "<br>";
echo substr($cad, 2);
//str_replace($cad1 ,cad2, cad3) sustituye cad1 por cad2 en cad3
$cadena = "Manolo Perez Sanchez";
echo "<br>";
echo str_replace(" ","_", $cadena);
$cadena = "El año que viene vendra el niño";
echo "<br>";
echo str_replace("ñ","ni", $cadena);
echo "<br>";
//ltrim, trim, rtrim
$cadena = "   Hola soy una cadena   ";
//echo ltrim($cadena). "<br>";
//echo rtrim($cadena). "<br>";
echo "La longitud de \$cadena = $cadena es: ". strlen($cadena). "<br>";
echo "La longitud de la cadena trimeada es: ". strlen(trim($cadena)). "<br>";
//str_pad
$cadena = "Hola mundo";
$cadena1 = str_pad($cadena,20);
$cadena2 = str_pad($cadena,20, STR_PAD_BOTH);
echo "<hr>";
echo "La longitud de \$cadena = $cadena es: ". strlen($cadena). "<br>";
echo "La longitud de \$cadena1 = $cadena1 es: ". strlen($cadena1). "<br>";
echo "La longitud de \$cadena2 = $cadena2 es: ". strlen($cadena2). "<br>";
//Mayusculas, minusculas strtolower, strtoupper, ucwords, ucfirst
$nombre = "manolo perez sanchez";
echo strtoupper($nombre). "<br>";
echo ucwords($nombre). "<br>";
echo ucfirst($nombre). "<br>";

//html: htmlspecialchars(); htmlentities();
echo "La negrita la ponemos con <b>Esto</b>\n";
echo "<br>\n";
echo htmlspecialchars("La negrita la ponemos con <b>Esto</b>\n");
