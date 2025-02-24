<?php
// helpers.php

function base_url() {
    // Detecta si se está usando HTTPS o HTTP
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || 
        $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    
    // Obtiene el directorio del script (para cuando la app está en un subdirectorio)
    $script_name = dirname($_SERVER['SCRIPT_NAME']);
    // Si el directorio es la raíz ('/'), lo dejamos vacío
    $script_name = ($script_name === DIRECTORY_SEPARATOR) ? '' : $script_name;
    
    // Retorna la URL base con una barra final
    return rtrim($protocol . $_SERVER['HTTP_HOST'] . $script_name, '/\\') . '/';
}
?>
