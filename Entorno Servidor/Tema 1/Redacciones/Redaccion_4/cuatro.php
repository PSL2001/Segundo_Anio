<?php
function CrearHTML(string $title)
{
    echo <<< TEXTO
    <!DOCTYPE html>
    <html lang='es'>
    <head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>$title</title>
    </head>
    <body>
     El titulo de esta pagina es $title
    </body>
    </html>

    TEXTO;
}


CrearHTML("Ejercicio 4");