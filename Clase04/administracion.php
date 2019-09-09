<?php
require "clases/producto.php";
require "clases/archivo.php";
    $op = $_POST["op"];
    $op = "MOSTRAR";
    $nombre = $_POST["nombre"];
    $nombre = "7up";
    $cod_barra = $_POST["codigo"];
    $cod_barra = "1237";
    $path = $_POST["path"];
    $path = "./archivos/" . $_FILES["archivo"]["name"];
    switch($op)
    {
        case "ALTA":
            $p = new Producto($nombre,$cod_barra,$path);
            if(Archivo::Subir())
            {
                echo("Se guardo el archivo correctamente <br>");
            }
            else
            {
                echo("No se pudo guardar el archivo <br>");
            }
            if(Producto::Guardar($p))
            {
                echo("Se guardo el producto correctamente <br>");
            }
            else
            {
                echo("No se pudo guardar el producto <br>");
            }
            break;
        case "MOSTRAR":
            $productos = Producto::TraerTodosLosProductos();
            foreach ($productos as $item) 
            {
                echo($item->ToString());
                echo("<br>");
                echo("<img src='".$item->path_foto."' width='640' height='480'");
                echo("<br>");
            }
            break;
        case ""://ingreso de usuario, que admita nombre y clave
    }

