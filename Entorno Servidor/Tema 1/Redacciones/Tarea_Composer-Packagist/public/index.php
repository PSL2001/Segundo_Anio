<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Uso de la libreria libphonenumber</title>
</head>
<body style="background-color: silver;">
    <div class="container mt-4">
        <h1 class="mb-3">Demostracion de la libreria libphonenumber</h1>
        <form action="resultado.php" method="get">
        <div class="row mb-3">
            <label for="telefono" class="col-3 col-form-label">Numero de Telefono</label>
            <div class="col-9">
                <input type="tel" class="form-control" id="telefono" name='telefono' required placeholder="0161 496 0000">
            </div>
        </div>
        <div class="row mb-3">
            <label for="pais" class="col-3 col-form-label">Pais por defecto</label>

            <div class="col-9">
                <input type="text" class="form-control col-1" id="pais" name='pais'
                       placeholder="GB" aria-describedby="countryHelpBlock" style="min-width: 50px;">
                <p id="AyudaIDPais" class="form-text text-muted">
                    El <a href='http://www.iso.org/iso/country_names_and_code_elements'>ISO
                        3166-1</a>, es un codigo de dos letras de un pais.
                    <br/>
                    Si el numero se pasa en un formato internacional (e.j. <code>+44 117 496 0123</code>),
                    entonces el codigo de region no se necesita, y puede ser nulo. Si no es el caso, la libreria utilizará
                    el codigo de region para ver el tipo de telefono basado en las normas de la región.</p>
            </div>
        </div>
        <div class="row mb-3">
            <label for="language" class="col-3 col-form-label">Geocodificacion local</label>

            <div class="col-9">
                <div class="row form-inline">
                    <div class="col-3">
                        <input type="text" class="form-control" id="lenguaje" name='lenguaje' placeholder="en"
                               aria-describedby="languageHelpBlock">
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="region" name='region' placeholder="GB"
                               aria-describedby="languageHelpBlock">
                    </div>
                </div>
                <p id="languageHelpBlock" class="form-text text-muted">Un <a
                            href='https://es.wikipedia.org/wiki/Código_de_idioma_IETF'> lenguaje IETF
                        tag</a> (por defecto 'en')</p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="offset-3 col-9">
                <button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
            </div>
        </div>
        </form>
    </div>
</body>
</html>
