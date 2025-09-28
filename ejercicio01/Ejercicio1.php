<?php

/**
 * Ejercicio 1 - Dado un fichero con columnas : z1,z2,ops. donde:
 * op ∈ {suma, resta, producto, division}
 * Se debe calcular z1 (op) z2 y generar como salida un fichero resultado.csv.
 * 
 * @author cdiagal
 * @version 1.0.0
 */


if(!file_exists("ops.csv")){
    file_put_contents("ops.csv" , "3,1,suma\n 5,2,producto\n 7,0,division\n 9,4,resta\n");
}


$ficheroOrigen = fopen("ops.csv" , "r");

$ficheroResultados = fopen("resultados.csv" , "w");

while (($linea = fgetcsv($ficheroOrigen)) !== false) {
    if(count($linea) < 3) continue;

    [$z1,$z2,$op] = $linea;
    $z1 = (int) trim($z1);
    $z2 = (int) trim($z2);
    $op = strtolower($op);
    $resultado = "ERROR";

    switch ($op) {
        case "suma":
            $resultado = $z1 + $z2;
            break;
        case "resta":
            $resultado = $z1 - $z2;
            break;
        case "producto":
            $resultado = $z1 * $z2;
            break;
        case "division":
            $resultado = $z1 / $z2;
            break;
        default:
            $resultado = "operacion erronea";
            break;
    }

    fputcsv($ficheroResultados, [$z1,$z2,$op,$resultado]);
}

fclose($ficheroOrigen);
fclose($ficheroResultados);