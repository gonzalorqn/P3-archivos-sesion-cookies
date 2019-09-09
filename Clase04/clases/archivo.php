<?php
class Archivo
{
    public static function Subir()
    {
        $destino = "./archivos/" . $_FILES["archivo"]["name"];
        $uploadOk = TRUE;
        if ($_FILES["archivo"]["size"] > 800000)
        {
            echo "El archivo es demasiado grande. Verifique!!!";
            $uploadOk = FALSE;
        }

        if ($uploadOk === FALSE) 
        {
            return false;
        }
        else
        {
            if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino)) 
            {
                return true;
            }
            else 
            {
                return false;
            }
        }
    }
}