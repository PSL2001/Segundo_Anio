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

<body style="background-color: aquamarine;">
    <h3 class="mt-4 text-center">Formulario 1</h3>
    <div class="container">
        <form action="pf1.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="El nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="mail" class="form-control" id="exampleFormControlInput1" placeholder="tu-correo" name="correo" required>
            </div>
            <div class="mb-3">
            <label for="labelprov" class="form-label">Provincia</label>
                <select class="form-select" aria-label="Default select example" name="provincia">
                    <option value="1" selected>Elije una provincia</option>
                    <option>Almería</option>
                    <option>Cádiz</option>
                    <option>Sevilla</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Habla sobre ti</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="texto" required></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Enviar</button>
                <button type="reset" class="btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
            </div>
        </form>
    </div>
</body>

</html>