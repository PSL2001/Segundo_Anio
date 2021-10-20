<!DOCTYPE html>
    <html lang="es">

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
            <div class="card mx-auto bg-dark text-light" style="width: 34rem;">
                <div class="card-header text-center">
                    Login I.E.S Al-Andalus
                </div>
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Direccion de Email</label>
                            <input type="email" class="form-control" id="mail" placeholder="correo@mail.es" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="contraseña" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="pass" name="pass">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="ru" name="recordar">
                            <label class="form-check-label text-light" for="ru">
                                Recordar Usuario
                            </label>
                        </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="login"><i class="fas fa-sign-in-alt"></i> Login</button>
                    <button type="reset" class="btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
                </div>
                </form>
            </div>
        </div>
    </body>

    </html>