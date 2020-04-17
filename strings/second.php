<?php

//Пусть есть две подстроки. Выяснить, есть ли в обеих подстроках одинаковые символы.
function find($f_substr, $s_substr)
{
    $result = "";
    if (strlen($f_substr) < strlen($s_substr)) {
        $n = strlen($f_substr);
        $m = strlen($s_substr);
        $shorter = str_split($f_substr);
        $longer = str_split($s_substr);
    } else {
        $n = strlen($s_substr);
        $m = strlen($f_substr);
        $shorter = str_split($s_substr);
        $longer = str_split($f_substr);
    }
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            if ($longer[$j] == $shorter[$i]) {
                $result .= $longer[$j];
            }
        }
    }
    $result = str_split($result);
    $result = array_unique($result);
    $result = implode($result);
    $output = "
    <html>
    <head>
    <title>Одинаковые символы</title>
</head>
<body>
<h2>Одинаковые символы: $result</h2>
</body>";
    echo $output;
}

if (isset($_POST['first']) and isset($_POST['second'])){
    find(htmlentities($_POST['first']), htmlentities($_POST['second']));
}
