<?php

$estadoCivil = 'c';
if ($estadoCivil == 's') {
    echo "soltero/a";
} else if ($estadoCivil == 'c') {
    echo "casado/a";
} else if ($estadoCivil == 'v') {
    echo "viudo/a";
} else {
    echo "no indica";
}

echo "<hr>";

if ($estadoCivil == 's') {
    echo "soltero/a";
} elseif ($estadoCivil == 'c') {
    echo "casado/a";
} elseif ($estadoCivil == 'v') {
    echo "viudo/a";
} else {
    echo "no indica";
}

echo "<hr>";

switch ($estadoCivil) {
    case 's':
        echo "soltero/a";
        break;
    case 'c':
        echo "casado/a";
        break;
    case 'v':
        echo "viudo/a";
        break;
    default:
        echo "no indica";
}

echo "<hr>";

$edad = 18;
echo ($edad<18) ? "Es menor de edad. Tiene $edad años" : "Es mayor de edad. Tiene $edad años";

echo "<hr>";

$msg = match ($estadoCivil){    #v8.0
    's' => "soltero/a",
    'c' => "casado/a",
    'v' => "viudo/a",
    default => "no indica"
};
echo $msg;