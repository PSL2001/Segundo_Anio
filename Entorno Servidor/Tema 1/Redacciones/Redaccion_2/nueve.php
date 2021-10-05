<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table,td {
	    border: 1px solid black;}
    </style>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <title>Ejercicio 9</title>
</head>

<body>
    <?php
    $articulos = [
        "articulo1" => [
            "nombre" => "Bombilla",
            "pvp" => 23.4,
            "tipo" => "Electricidad",
            "stock" => 45
        ],
        "articulo2" => [
            "nombre" => "Brasero",
            "pvp" => 123.4,
            "tipo" => "Electricidad",
            "stock" => 4
        ],
        "articulo3" => [
            "nombre" => "Monitor LED 19",
            "pvp" => 203.4,
            "tipo" => "Informatica",
            "stock" => 5
        ],
        "articulo4" => [
            "nombre" => "Tablet 10",
            "pvp" => 123.4,
            "tipo" => "Informatica",
            "stock" => 45
        ]
    ];

    $countStock=0;
        echo "<br><table align='center' border='3' width='100%' height='100%'>".PHP_EOL;
        echo "<tr>".PHP_EOL.
        "<td> </td>".PHP_EOL.
        "<td>Nombre</td>".PHP_EOL.
        "<td>PVP (€)</td>".PHP_EOL.
        "<td>Tipo</td>".PHP_EOL.
        "<td>Stock</td>".PHP_EOL.
        "</tr>".PHP_EOL;
        for($i=0;$i<count($articulos);$i++){
            echo "<tr>".PHP_EOL;
            echo "<td>".key($articulos)."</td>".PHP_EOL;
            $aux=current($articulos);
            $countStock=$countStock+$aux["stock"];
            for($j=0;$j<count($aux);$j++){
                echo "<td>".current($aux)."</td>".PHP_EOL;
                next($aux);
            }
            next($articulos);
            echo "</tr>".PHP_EOL;
        }

        echo "</table>".PHP_EOL;

        echo "<br>El total de stock es de : $countStock<br><br>".PHP_EOL;

        reset($articulos);
        $countStock=0;
        echo "<br><table align='center' border='3' width='100%' height='100%'>".PHP_EOL;
        echo "<tr>".PHP_EOL.
        "<td></td>".PHP_EOL.
        "<td>Nombre</td>".PHP_EOL.
        "<td>PVP (€)</td>".PHP_EOL.
        "<td>Tipo</td>".PHP_EOL.
        "<td>Stock</td>".PHP_EOL.
        "</tr>".PHP_EOL;
        for($i=0;$i<count($articulos);$i++){
            $aux=current($articulos);
            if($aux["tipo"]=="Informatica"){
                echo "<tr>".PHP_EOL;
            echo "<td>".key($articulos)."</td>".PHP_EOL;
            $countStock=$countStock+$aux["stock"];
            for($j=0;$j<count($aux);$j++){
                echo "<td>".current($aux)."</td>".PHP_EOL;
                next($aux);
            }
            echo "</tr>".PHP_EOL;
            }
            next($articulos);
        }

        echo "</table>".PHP_EOL;

        echo "<br>El total de stock es de : $countStock<br><br>".PHP_EOL;
    ?>
</body>

</html>