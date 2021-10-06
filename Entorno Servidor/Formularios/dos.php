<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- CDN de Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body style="background-color: dodgerblue;">
    <div class="container mt-4">
        <form action="pf2.php" name="12" method="post">
            <p class="mt-2">Elije una Capital</p>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Madrid" id="id1" name="prov[]">
                <label class="form-check-label" for="id1">
                    Madrid
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Paris" id="id2" name="prov[]">
                <label class="form-check-label" for="id2">
                    París
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Londres" id="id3" name="prov[]">
                <label class="form-check-label" for="id3">
                    Londres
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Merlin" id="id4" name="prov[]">
                <label class="form-check-label" for="id4">
                    Merlín
                </label>
            </div>
            <div class="mt-4">
                <select class="form-select" multiple aria-label="multiple select example" name="prov1[]">
                    <option selected disabled>Elije tus provincias</option>
                    <option>Madrid</option>
                    <option>País</option>
                    <option>Londres</option>
                    <option>Berlin</option>
                </select>
            </div>
            <div class="mt-4">
                <p class="mb-2">Has visitado realmente estas capitales?</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rb" id="rb1" value="Si">
                    <label class="form-check-label" for="rb1">
                        Si
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rb" id="rb2" value="No">
                    <label class="form-check-label" for="rb2">
                        No
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rb" id="rb3" value="No sabe">
                    <label class="form-check-label" for="rb3">
                        No sabe / No contesta
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Enviar</button>
                <button type="reset" class="btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
            </div>
        </form>
    </div>
</body>

</html>