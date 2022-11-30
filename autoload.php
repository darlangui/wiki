<?php
    spl_autoload_register(function (string $className){
        $way = str_replace('Alura\\Banco', 'src', $className);
        $way = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        $way = $way . '.php';
        if(file_exists($way)){
            require_once $way;
        }
    }
    );
?>