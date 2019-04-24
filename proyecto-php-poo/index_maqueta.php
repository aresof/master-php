<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Tienda de Camisetas</title>
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
    </head>
    <body>
    <div id="container">

        <!-- CABECERA -->
        <header id="header">
            <div id="logo">
                <img src="assets/img/camiseta.png">
                <a href="index_maqueta.php">Tienda de Camisetas</a>
            </div>
        </header>

        <!-- MENU -->
        <nav id="menu">
            <ul>
                <li>
                    <a href="#">Inicio</a>
                </li>
                <li>
                    <a href="#">Categoria 1</a>
                </li>
                <li>
                    <a href="#">Categoria 2</a>
                </li>
                <li>
                    <a href="#">Categoria 3</a>
                </li>

            </ul>
        </nav>

        <div id="content">
            <!-- LATERAL -->
            <aside id="lateral">
                <h3>Entrar a la web</h3>
                <div id="login" class="block_aside">
                    <form action="#" method="post">
                        <label for="email">Email</label>
                        <input type="email" name="email">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password">
                        <input type="submit" value="Enviar">
                    </form>

                    <ul>
                        <li><a href="#">Mis pedidos</a></li>
                        <li><a href="#">Categorias</a></li>
                    </ul>

                </div>
            </aside>

            <!-- CENTRAL -->
            <div id="central">
                <h1>Productos destacados</h1>
                <div class="product">
                    <img src="assets/img/camiseta.png">
                    <h2>Camiseta azul ancha</h2>
                    <p>30 euros</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png">
                    <h2>Camiseta azul ancha</h2>
                    <p>30 euros</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png">
                    <h2>Camiseta azul ancha</h2>
                    <p>30 euros</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png">
                    <h2>Camiseta azul ancha</h2>
                    <p>30 euros</p>
                    <a href="" class="button">Comprar</a>
                </div>
            </div>

        </div>

        <!-- PIE -->
        <footer id="footer">
            <p>Desarrollado por Arturo &copy; <?=date('Y')?></p>
        </footer>
    </div>
    </body>
</html>