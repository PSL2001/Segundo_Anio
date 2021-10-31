<?php

namespace source;

session_start();
require dirname(__DIR__, 1) . "/vendor/autoload.php";

use libphonenumber;

if (isset($_GET['enviar'])) {
    # Le hemos dado el boton, procesamos el formulario
    //Como son muchos los checkeos, he decidido ponerlos en un array
    $input = array();
    $input['telefono'] = $_GET['telefono'];
    //Exceptuando el telefono, los demas campos pueden ser dejados en blanco, ya que cojeremos un valor por defecto
    $input['pais'] = (isset($_GET['pais'])) ? $_GET['pais'] : null;
    $input['lenguaje'] = (isset($_GET['lenguaje']) && $_GET['lenguaje'] != '') ? $_GET['lenguaje'] : 'en';
    $input['region'] = (isset($_GET['region']) && $_GET['region'] != '') ? $_GET['region'] : null;


    //Aqui empezamos a usar la libreria, o mas bien, los metodos de la libreria: Segun la documentacion, para acceder a los metodos, debemos tener su instancia antes
    //getInstance(), nos da esas funciones y las guarda en la variable
    $phoneNumberUtil = libphonenumber\PhoneNumberUtil::getInstance(); //Esto es para telefonos normales (950 062 985)
    $shortNumberInfo = libphonenumber\ShortNumberInfo::getInstance(); //Esto es para telefonos cortos (ej: 1004)
    $phoneNumberGeocoder = libphonenumber\geocoding\PhoneNumberOfflineGeocoder::getInstance(); //Y esto es para la geolocalizacion del telefono (donde podria existir dicho telefono)

    //Pasemos ahora a las funciones en si, primero vamos a crearnos unas variables
    $numeroValido = false;
    $numeroValidoParaRegion = false;
    $posibleNumero = false;
    $EsPosibleNumeroEnRazon = null;
    $geolocalizacion = null;
    $InformacionNumTel = null;
    $zonaHoraria = null;

    try {
        //Uso completo de PhoneNumber Util una de las librerias de libphonenumber
        $telefono = $phoneNumberUtil->parse($input['telefono'], $input['pais'], null, true); //Parseamos el telefono
        $posibleNumero = $phoneNumberUtil->isPossibleNumber($telefono); //Booleano que devuelve si es un posible numero
        $EsPosibleNumeroEnRazon = $phoneNumberUtil->isPossibleNumberWithReason($telefono); // Nos devuelve un booleano si nos dice que podria ser un posible numero es decir, si ese telfono podria existir
        $numeroValido = $phoneNumberUtil->isValidNumber($telefono); //Dice si el telefono es valido
        $numeroValidoParaRegion = $phoneNumberUtil->isValidNumberForRegion($telefono, $input['pais']); //Lo mismo que lo anterior pero en la region
        $InformacionNumTel = $phoneNumberUtil->getRegionCodeForNumber($telefono); //Devuelve el codigo de la ragion del telefono
        $tipoTel = $phoneNumberUtil->getNumberType($telefono); //Nos devuelve si el telefono es uno fijo o movil


        $geolocalizacion = $phoneNumberGeocoder->getDescriptionForNumber(
            $telefono,
            $input['lenguaje'],
            $input['region']
        ); //Devuelve una descripcion del telefono basada en el lenguaje y la region

        $nombreTel = \libphonenumber\PhoneNumberToCarrierMapper::getInstance()->getNameForNumber(
            $telefono,
            $input['lenguaje']
        );
        $zonaHoraria = \libphonenumber\PhoneNumberToTimeZonesMapper::getInstance()->getTimeZonesForNumber($telefono);
    } catch (\Exception $ex) {
        die("Algo salio mal: " . $ex->getMessage());
    }

    $regiones = $phoneNumberUtil->getSupportedRegions(); //Esto nos devuelve las regiones en la que se puede llamar el telefono

    asort($regiones); //Las ordenamos
} else {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Resultados</title>
</head>

<body>
    <h2><code><?php echo get_class($telefono) ?></code> Object</h2>
    <div class="row">
        <div class="col-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>Funcion</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    /*
                    * getCountryCode() devuelve el codigo del pais
                    * getNationalNumber() devuelve el numero en formato nacional
                    * getExtension() devuelve, si tiene, una extension del telefono
                    * getCountryCodeSource() devuelve la fuente de la que probiene el telefono, es decir, si es fijo, movil, etc.
                    * isItalianLeadingZero() devuelve un booleano que nos dice si el telefono es italiano empezando por 0
                    * getRawinput() devuelve el telefono tal cual lo hemos escrito
                    */
                    echo <<< TEXTO
                <tr>
                    <th><code>getCountryCode()</code></th>
                    <td>{$telefono->getCountryCode()}</td> 
                </tr>
                <tr>
                    <th><code>getNationalNumber()</code></th>
                    <td>{$telefono->getNationalNumber()}</td>
                </tr>
                <tr>
                    <th><code>getExtension()</code></th>
                    <td>{$telefono->getExtension()}</td>
                </tr>

                <tr>
                    <th><code>getCountryCodeSource()</code></th>
                    <td>
            TEXTO;
                    if ($telefono->getCountryCodeSource() == 0) {
                        echo "FROM_NUMBER_WITH_PLUS_SIGN";
                    } else if ($telefono->getCountryCodeSource() == 1) {
                        echo "FROM_NUMBER_WITH_IDD";
                    } else if ($telefono->getCountryCodeSource() == 2) {
                        echo "FROM_NUMBER_WITHOUT_PLUS_SIGN";
                    } else if ($telefono->getCountryCodeSource() == 3)
                        echo "FROM_DEFAULT_COUNTRY";
                    echo <<< TEXTO2
                </td>
                </tr>
                <tr>
                    <th><code>isItalianLeadingZero()</code></th>
                <td>
                TEXTO2;
                    if ($telefono->isItalianLeadingZero()) {
                        echo "TRUE";
                    } else {
                        echo "FALSE";
                    }
                    echo "</td>";
                    echo "</tr>\n <tr>\n <th><code>getRawInput()</code></th>
            \n <td>" . $telefono->getRawInput() . "</td>\n </tr>";
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <hr />
    <h2>Resultados de la Validacion</h2>
    <div class="row">
        <div class="col-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>Function</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <a href="https://giggsey.github.io/libphonenumber-for-php/docs/PhoneNumberUtil.html#ispossiblenumber" target="_blank">
                                <code title="PhoneNumberUtil->isPossibleNumber(PhoneNumber $number)" data-toggle="tooltip">isPossibleNumber()</code>
                            </a>
                        </th>
                        <td>
                            <?php
                            if ($posibleNumero == false) { //Si el telefono que pasamos no es real, comprobamos si al menos podria existir

                                if ($EsPosibleNumeroEnRazon == 0) { //Depende del resultado que nos de la variable, puede tener varios significados (0 al 4)
                                    echo "No es Real, pero podria existir";
                                } else if ($EsPosibleNumeroEnRazon == 1) {
                                    echo "Codigo de Pais no valido";
                                } else if ($EsPosibleNumeroEnRazon == 2) {
                                    echo "El telefono es demasiado corto";
                                } else if ($EsPosibleNumeroEnRazon == 3) {
                                    echo "El telefono es demasiado largo";
                                }
                            } else {
                                echo "El telefono es real";
                            }
                            ?>
                    <tr>
                        <th>
                            <a href="https://giggsey.github.io/libphonenumber-for-php/docs/PhoneNumberUtil.html#isvalidnumber" target="_blank">
                                <code title="PhoneNumberUtil->isValidNumber(PhoneNumber $number)" data-toggle="tooltip">isValidNumber()</code>
                            </a>
                        </th>
                        <td><?php echo ($numeroValido) ? "El numero es valido" : "El Numero no es valido"; //Nos dice si el telefono es valido ?></td>
                    </tr>
                    <tr>
                        <th>
                            <a href="https://giggsey.github.io/libphonenumber-for-php/docs/PhoneNumberUtil.html#isvalidnumberforregion" target="_blank">
                                <code title="PhoneNumberUtil->isValidNumberForRegion(PhoneNumber $number, String $region)" data-toggle="tooltip">isValidNumberForRegion()</code>
                            </a>
                        </th>
                        <td><?php echo ($numeroValidoParaRegion) ? "Es Valido para la region" : "No es Valido para la region";  //Si vale para la region o no?></td>
                    </tr>
                    <tr>
                        <th>
                            <a href="https://giggsey.github.io/libphonenumber-for-php/docs/PhoneNumberUtil.html#getregioncodefornumber" target="_blank">
                                <code title="PhoneNumberUtil->getRegionCodeForNumber(PhoneNumber $number)" data-toggle="tooltip">getRegionCodeForNumber()</code>
                            </a>
                        </th>
                        <td>
                            <?php
                            if ($InformacionNumTel) { //Si existiera la informacion del telefono (si $InformacionNumTel != null)
                                echo "<span title='{$InformacionNumTel}' data-toggle='tooltip'>$InformacionNumTel</span>";
                            ?>
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <a href="https://giggsey.github.io/libphonenumber-for-php/docs/PhoneNumberUtil.html#getnumbertype" target="_blank">
                                <code title="PhoneNumberUtil->getNumberType(PhoneNumber $number)" data-toggle="tooltip">getNumberType()</code>
                            </a>
                        </th>
                        <td>
                            <?php
                                switch ($tipoTel) { //Depende de lo que valga tipoTel, cambia el tipo de telefono
                                    case 0:
                                        echo "Linea Fija";
                                        break;
                                    case 1:
                                        echo "Linea Movil";
                                        break;
                                    case 2:
                                        echo "Linea Fija o Movil";
                                        break;
                                    case 3:
                                        echo "Linea de pago gratuito";
                                        break;
                                    case 4:
                                        echo "Linea Premium";
                                        break;
                                    case 5:
                                        echo "Linea de pago compartido";
                                        break;
                                    case 6:
                                        echo "Linea VOIP";
                                        break;
                                    case 7:
                                        echo "Telefono personal";
                                        break;
                                    case 8:
                                        echo "Linea PAGER";
                                        break;
                                    case 9:
                                        echo "Linea UAN";
                                        break;
                                    case 10:
                                        echo "Linea desconocida";
                                        break;
                                    case 27:
                                        echo "Linea de Emergencias";
                                        break;
                                    case 28:
                                        echo "Mensaje de Voz";
                                        break;
                                    case 29:
                                        echo "Linea de codigo corto";
                                        break;
                                    case 30:
                                        echo "Linea de rate Estandar";
                                        break;
                                }

                            ?>
                        </td>
                    </tr>
                <?php
                            } // fin del if
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <h2>Formato</h2>

    <h4>
        <a href="https://giggsey.github.io/libphonenumber-for-php/docs/PhoneNumberUtil.html#format" target="_blank">
            <code title="PhoneNumberUtil->format()" data-toggle="tooltip">
                format()
            </code>
        </a>
    </h4>

    <div class="row">
        <div class="col-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>Formato</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th title="libphonenumber\PhoneNumberFormat::E164" data-toggle="tooltip">E164</th>
                        <td>
                            <?php
                            if ($numeroValido == true) { //comprobamos si es valido el telefono
                                echo $phoneNumberUtil->format($telefono, libphonenumber\PhoneNumberFormat::E164); //Si lo es, lo parseamos
                            } else {
                                echo "<em>Numero invalido</em>";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th title="libphonenumber\PhoneNumberFormat::NATIONAL" data-toggle="tooltip">Nacional</th>
                        <td>
                            <?php
                            //Hacemos lo mismo para el resto de formatos
                            if ($numeroValido == true) {
                                echo $phoneNumberUtil->format($telefono, libphonenumber\PhoneNumberFormat::NATIONAL);
                            } else {
                                echo "<em>Numero invalido</em>";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th title="libphonenumber\PhoneNumberFormat::INTERNATIONAL" data-toggle="tooltip">Internacional</th>
                        <td>
                            <?php
                            if ($numeroValido == true) {
                                echo $phoneNumberUtil->format($telefono, libphonenumber\PhoneNumberFormat::INTERNATIONAL);
                            } else {
                                echo "<em>Numero invalido</em>";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th title="libphonenumber\PhoneNumberFormat::RFC3966" data-toggle="tooltip">RFC3966</th>
                        <td>
                            <?php
                            if ($numeroValido == true) {
                                echo $phoneNumberUtil->format($telefono, libphonenumber\PhoneNumberFormat::RFC3966);
                            } else {
                                echo "<em>Numero invalido</em>";
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    if ($numeroValido == true) { //Si el telefono es valido mostramos la tabla de formatos
    ?>
        <h4>
            <a href="https://giggsey.github.io/libphonenumber-for-php/docs/PhoneNumberUtil.html#formatoutofcountrycallingnumber" target="_blank">Formato del número de llamada fuera del país</a>
            /
            <a href="https://giggsey.github.io/libphonenumber-for-php/docs/PhoneNumberUtil.html#formatoutofcountrycallingnumber" target="_blank">Formato del número para la marcación móvil</a>
        </h4>
        <div class="row">
            <div class="col-4 overflow-auto" id="country-list">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Region</th>
                            <th>
                                <a href="https://giggsey.github.io/libphonenumber-for-php/docs/PhoneNumberUtil.html#formatoutofcountrycallingnumber" target="_blank">
                                    <code title="PhoneNumberUtil->formatOutOfCountryCallingNumber(PhoneNumber $number, string $regionCallingFrom)" data-toggle="tooltip">formatOutOfCountryCallingNumber()</code>
                                </a>
                            </th>
                            <th>
                                <a href="https://giggsey.github.io/libphonenumber-for-php/docs/PhoneNumberUtil.html#formatnumberformobiledialing" target="_blank">
                                    <code title="PhoneNumberUtil->formatNumberForMobileDialing(PhoneNumber $number, string $regionCallingFrom, bool $format)" data-toggle="tooltip">formatNumberForMobileDialing()</code>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($regiones as $region) {
                            echo <<< TEXTO
                            <tr>
                            <td>
                            <span title='{$region}' data-toggle="tooltip" data-placement="top" class="flag-country">
                            $region
                            </span>
                            </td>
                            <td>{$phoneNumberUtil->formatOutOfCountryCallingNumber($telefono,$region)}</td>
                            <td>{$phoneNumberUtil->formatNumberForMobileDialing($telefono,$region, true)}</td>
                            TEXTO;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php
    }
    ?>

    <h2>ShortNumberInfo</h2>
    <div class="row">
        <div class="col-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>Function</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <a href="https://giggsey.github.io/libphonenumber-for-php/docs/ShortNumberInfo.html#ispossibleshortnumber" target="_blank">
                                <code>isPossibleShortNumber()</code>
                            </a>
                        </th>
                        <td><?php echo ($shortNumberInfo->isPossibleShortNumber($telefono)) ? "Es un posible numero corto" : "No es un posible numero corto"; //Si el telefono es corto o no ?></td>
                    </tr>

                    <tr>
                        <th>
                            <a href="https://giggsey.github.io/libphonenumber-for-php/docs/ShortNumberInfo.html#isvalidshortnumberforregion" target="_blank">
                                <code>isValidShortNumberForRegion()</code>
                            </a>
                        </th>
                        <td><?php echo ($shortNumberInfo->isPossibleShortNumberForRegion($telefono, $InformacionNumTel)) ? "Es un posible numero corto para la region" : "No es un posible numero corto para la region"; //Si el telefono es corto o no ?></td>
                    </tr>

                    <tr>
                        <th>
                            <a href="https://giggsey.github.io/libphonenumber-for-php/docs/ShortNumberInfo.html#getexpectedcost" target="_blank">
                                <code>getExpectedCost()</code>
                            </a>
                        </th>
                        <td>
                            <?php
                            $costeEsperado = $shortNumberInfo->getExpectedCost($telefono);
                            //Cuanto valdria llamar al telefono
                            if ($costeEsperado == 3) {
                                echo "No hay coste";
                            } else if ($costeEsperado == 4) {
                                echo "Tasa Premium";
                            } else if ($costeEsperado == 30) {
                                echo "Coste estandar";
                            } else if ($costeEsperado == 10) {
                                echo "Coste desconocido";
                            }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            <a href="https://giggsey.github.io/libphonenumber-for-php/docs/ShortNumberInfo.html#getexpectedcostforregion" target="_blank">
                                <code>getExpectedCostForRegion()</code>
                            </a>
                        </th>
                        <td>
                            <?php
                            //Cuanto valdria llamar al telefono dentro de la region
                            $costeEsperadoReg = $shortNumberInfo->getExpectedCostForRegion($telefono, $InformacionNumTel);

                            if ($costeEsperado == 3) {
                                echo "No hay coste";
                            } else if ($costeEsperado == 4) {
                                echo "Tasa Premium";
                            } else if ($costeEsperado == 30) {
                                echo "Coste estandar";
                            } else if ($costeEsperado == 10) {
                                echo "Coste desconocido";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <a href="https://giggsey.github.io/libphonenumber-for-php/docs/ShortNumberInfo.html#isemergencynumber" target="_blank">
                                <code>isEmergencyNumber()</code>
                            </a>
                        </th>
                        <td><?php echo ($shortNumberInfo->isEmergencyNumber($input['telefono'], $input['pais'])) ? "Es un telefono de emergencia" : "No es un telefono de emergencia"; //Si es un telefono de emergencia o no (112/016, etc.) ?></td>
                    </tr>

                    <tr>
                        <th>
                            <a href="https://giggsey.github.io/libphonenumber-for-php/docs/ShortNumberInfo.html#connectstoemergencynumber" target="_blank">
                                <code>connectsToEmergencyNumber()</code>
                            </a>
                        </th>
                        <td><?php echo ($shortNumberInfo->connectsToEmergencyNumber($input['telefono'], $input['pais'])) ? "Conecta a un telefono de emergencia" : "No conecta a un telefono de emergencia"; //Si el telefono conecta a un telefono de emergencia ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr>

    <h2>Numeros de Ejemplo (Generacion de Numeros)</h2>
    <div class="row">
        <div class="col-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>Funcion</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <a href="https://giggsey.github.io/libphonenumber-for-php/docs/PhoneNumberUtil.html#getexamplenumber" target="_blank">
                                <code title="libphonenumber\PhoneNumberUtil->getExampleNumber(string $regionCode)" data-toggle="tooltip">getExampleNumber()</code>
                            </a>
                        </th>
                        <td><?php echo $phoneNumberUtil->getExampleNumber($input['pais']); //Devuelve un telefono que seria valido para el pais ?></td>
                    </tr>

                    <tr>
                        <th>
                            <a href="https://giggsey.github.io/libphonenumber-for-php/docs/PhoneNumberUtil.html#getexamplenumberfortype" target="_blank">
                                <code title="libphonenumber\PhoneNumberUtil->getExampleNumberForType()" data-toggle="tooltip">getExampleNumberForType()</code>
                            </a>
                        </th>
                        <td><?php echo $phoneNumberUtil->getExampleNumberForType($input['pais'], $tipoTel); //devuelve un telefono valido para el pais segun el tipo de telefono ?></td>
                    </tr>
                    <tr>
                        <th>
                            <a href="https://giggsey.github.io/libphonenumber-for-php/docs/ShortNumberInfo.html#getexampleshortnumber" target="_blank">
                                <code title="libphonenumber\ShortNumberUtil->getExampleShortNumber()" data-toggle="tooltip">getExampleShortNumber()</code>
                            </a>
                        </th>
                        <td><?php echo $shortNumberInfo->getExampleShortNumber($input['pais']); //Obtienes un ejemplo de telefono corto segun el pais ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr>

    <h2>Resultado Geocodificador Offline</h2>
    <div class="row">
        <div class="col-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>Funcion</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <a href="https://giggsey.github.io/libphonenumber-for-php/docs/PhoneNumberOfflineGeocoder.html#getdescriptionfornumber" target="_blank">
                                <code title="PhoneNumberOfflineGeocoder->getDescriptionForNumber(PhoneNumber $phoneNumber, String $language, String $region)" data-toggle="tooltip">getDescriptionForNumber()</code>
                            </a>
                        </th>
                        <td><?php echo $geolocalizacion; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr>

    <h2>Nombre de la compañia al que pertenece el telefono</h2>
    <div class="row">
        <div class="col-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>Function</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <a href="https://giggsey.github.io/libphonenumber-for-php/docs/PhoneNumberToCarrierMapper.html#getnamefornumber" target="_blank">
                                <code title="PhoneNumberToCarrierMapper->getNameForNumber(PhoneNumber $phoneNumber, String $language)" data-toggle="tooltip">getNameForNumber()</code>
                            </a>
                        </th>
                        <td><?php echo $nombreTel  //Devuelve el nombre de la compañia que da el telefono?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <hr>

    <h2>Zonas Horarias del Telefono</h2>
    <div class="row">
        <div class="col-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>Funcion</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <a href="https://giggsey.github.io/libphonenumber-for-php/docs/PhoneNumberToTimeZonesMapper.html#gettimezonesfornumber" target="_blank">
                                <code title="PhoneNumberToTimeZonesMapper->getTimeZonesForNumber(PhoneNumber $phoneNumber)" data-toggle="tooltip">getTimeZonesForNumber()</code>
                            </a>
                        </th>
                        <td>
                            <ul>
                                <?php
                                //Devolvemos las zonas horarias del telefono
                                foreach ($zonaHoraria as $zona) {
                                    echo "<li>$zona</li>";
                                }
                                ?>
                            </ul>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>