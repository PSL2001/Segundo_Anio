<?php
session_start();

const TIEMPO_LOGOUT = 30;
const INTENTOS = 5;

$users = [
    "admin" => hash('sha256', 'secreto'),
    "usuario" => hash('sha256', 'usuario')
];


function hayError($c, $v): bool
{
    if (strlen($v) < 5) {
        $_SESSION[$c] = "Este campo debe conterner al menos 5 carácteres";
        return true;
    }

    return false;
}

function esUsuarioValido($u, $p): bool
{
    global $users;
    foreach ($users as $usuario => $contra) {
        if ($usuario == $u && $contra == $p) {
            return true;
        }
    }
    return false;
}

if (isset($_POST['btnLogin'])) {
    $error = false;
    $usu = trim($_POST['username']);
    $p = trim($_POST['password']);

    if (hayError("error_nombre", $usu)) $error = true;
    if (hayError("error_password", $p)) $error = true;


    if (!$error) {
        $pass = hash('sha256', $p);
        if (esUsuarioValido($usu, $pass)) {
            setcookie("errorV", "", time() - 100);
            $_SESSION['user'] = $usu;
            header("Location: index.php");
        } else {
            if (isset($_COOKIE['errorV'])) {
                $cont = ++$_COOKIE['errorV'];
                if ($cont == INTENTOS) {
                    setcookie("errorV", $cont, time() + TIEMPO_LOGOUT); //El tiempo es 30 segundos
                } else {
                    setcookie('errorV', $cont, time() + 3600);
                }
            } else {
                setcookie('errorV', 1, time() + 3600);
            }
            $total = (isset($_COOKIE['errorV'])) ? (INTENTOS - $_COOKIE['errorV']) : 4; //Si existe la cookie, los intentos seran el total de intentos menos el valor de la cookie
            $_SESSION['error_validacion'] = "Usuario o contraseña incorrectos, quedan " . $total . " intentos.";
            header("Location:{$_SERVER['PHP_SELF']}");
        }
    } else {
        header("Location:{$_SERVER['PHP_SELF']}");
    }
} else {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS TAILWIND -->
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- FONTAWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Login</title>
    </head>

    <body>
        <div class="font-sans">
            <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
                <div class="relative sm:max-w-sm w-full">
                    <div class="card bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
                    <div class="card bg-red-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
                    <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md">
                        <?php
                        if (isset($_SESSION['error_validacion'])) {
                            echo <<< TXT
                            <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <div>
                                <span class="font-medium">Error!</span> {$_SESSION['error_validacion']}
                            </div>
                            </div>
                            TXT;
                            unset($_SESSION['error_validacion']);
                        }
                        ?>
                        <label for="" class="block mt-3 text-sm text-gray-700 text-center font-semibold">
                            Login
                        </label>
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="mt-10">

                            <div>
                                <input type="text" name="username" placeholder="Nombre de Usuario" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                                <?php
                                if (isset($_SESSION['error_nombre'])) {
                                    echo <<< TXT
                                        <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                                            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                        <div>
                                        <span class="font-medium">Error!</span> {$_SESSION['error_nombre']}
                                        </div>
                                    </div>
                                    TXT;
                                    unset($_SESSION['error_nombre']);
                                }
                                ?>
                            </div>

                            <div class="mt-7">
                                <input type="password" name="password" placeholder="Contraseña" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                                <?php
                                if (isset($_SESSION['error_password'])) {
                                    echo <<< TXT
                                        <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                                            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                        <div>
                                        <span class="font-medium">Error!</span> {$_SESSION['error_password']}
                                        </div>
                                    </div>
                                    TXT;
                                    unset($_SESSION['error_password']);
                                } 
                                ?>
                            </div>

                            <div class="mt-7 flex">
                                <label for="remember_me" class="inline-flex items-center w-full cursor-pointer">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                    <span class="ml-2 text-sm text-gray-600">
                                        Recuerdame
                                    </span>
                                </label>

                                <div class="w-full text-right">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="#">
                                        ¿Olvidó su contraseña?
                                    </a>
                                </div>
                            </div>

                            <div class="mt-7">
                                <?php
                                if (isset($_COOKIE['errorV']) && $_COOKIE['errorV'] == 5) {
                                    echo "<button type='submit' disabled name='btnLogin' class='bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105'>
                                    Login (debes esperar 30 segundos)
                                    </button>";
                                } else {
                                    echo "<button type='submit' name='btnLogin' class='bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105'>
                                    Login
                                    </button>";
                                }
                                ?>
                                <button type="reset" class="bg-red-400 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out transform hover:-translate-x hover:scale-105">
                                    Limpiar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </body>

    </html>
<?php
}
?>