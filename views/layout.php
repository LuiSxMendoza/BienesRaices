<?php 

    if(!isset($_SESSION)) {
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices - <?php echo $titulo ?? ''; ?></title>

    <link rel="icon" href="build/img/Recurso4x.png">

    <link rel="stylesheet" href="/build/css/normalize.css">
    <link rel="stylesheet" href="/build/css/app.css">

</head>
<body>

    <header class="header barra <?php echo isset ($ext) ? 'ext' : ''; ?> <?php echo isset ($inicio) ? 'inicio' : ''; ?>">
        <div class="contenedor cont-header">
            <div class="navegacion">
                <a href="/index.php">
                    <img src="/build/img/logo.svg" alt="logotipo">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono-menu-responsive">
                </div>

                <div class="derecha">
                    <div class="derecha-bot">
                        <button class="dark-mode-bot" id="bot-dark">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brightness-half" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 9a3 3 0 0 0 0 6v-6z" />
                                    <path d="M6 6h3.5l2.5 -2.5l2.5 2.5h3.5v3.5l2.5 2.5l-2.5 2.5v3.5h-3.5l-2.5 2.5l-2.5 -2.5h-3.5v-3.5l-2.5 -2.5l2.5 -2.5z" />
                                  </svg>
                            </span>

                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-moon-stars" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                                <path d="M17 4a2 2 0 0 0 2 2a2 2 0 0 0 -2 2a2 2 0 0 0 -2 -2a2 2 0 0 0 2 -2" />
                                <path d="M19 11h2m-1 -1v2" />
                              </svg>
                            </span>
                        </button>
                    </div>
                    <div>
                        <nav class="enlaces">
                            <a href="/nosotros" class="bot">Nosotros</a>
                            <a href="/anuncios" class="bot">Anuncios</a>
                            <a href="/blog" class="bot">Blog</a>
                            <a href="/contacto" class="bot">Contacto</a>
                            <?php if(!$auth): ?>
                                <a href="/login" class="bot">Iniciar Sesion</a>
                            <?php endif; ?>

                            <?php if($auth): ?>
                                <a href="/admin" class="bot">Admin</a>
                                <a href="/logout" class="bot">Cerrar Sesion</a>
                            <?php endif; ?>
                        </nav>
                    </div>
                </div>
            </div>
            <?php echo isset ($inicio) ? "<h1 data-cy='heading-sitio'>Venta de Casas y Departamentos <br>Exclusivos de lujo</h1>" : ''; ?> 
    </header>

    <?php echo $contenido; ?>

    <footer class="footer">
        <div class="contenedor">
            
            <div class="navegacion">
                <nav class="navegacion-enlaces">
                    <a href="/nosotros" class="bot">
                        Nosotros
                    </a>
                    <a href="/anuncios" class="bot">
                        Anuncios
                    </a>
                    <a href="/blog" class="bot">
                        Blog
                    </a>
                    <a href="/contacto" class="bot">
                        Contacto
                    </a>
                    </a>
                </nav>
            </div>

            <div class="copy">
                <h1 class="copy-text">
                    Todos los Derechos Reservados &copy; 2021
                </h1>
            </div>

            <p class="no-margin tit-redes">
                Mis redes de contacto:
            </p>

            <div class="iconos">
                
                <a class="icono__margin" target="_blank" href="https://www.facebook.com/juanluis.mendozamartinez.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#1e90ff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                    </svg>
                </a>
                
                <a class="icono__margin" target="_blank" href="https://www.instagram.com/luis_mendoza33/">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fd0061" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <rect x="4" y="4" width="16" height="16" rx="4" />
                        <circle cx="12" cy="12" r="3" />
                        <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
                    </svg>
                </a>
            
                <a class="icono__margin" target="_blank" href="https://twitter.com/Luis_Mendoza33M">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-twitter" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00bfd8" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" />
                    </svg>
                </a>
    
                <a class="icono__margin" target="_blank" href="https://wa.link/j32l12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-whatsapp" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#32cd32" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                        <path d="M9 10a0.5 .5 0 0 0 1 0v-1a0.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a0.5 .5 0 0 0 0 -1h-1a0.5 .5 0 0 0 0 1" />
                    </svg>
                </a>

            </div>

        </div>
    </footer>

    <script src="/build/js/bundle.js"></script>

</body>
</html>