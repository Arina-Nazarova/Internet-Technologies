<?php
// Пусть дан текстовый файл. Необходимо распечатать строку максимальной длины.
function display($lines)
{
    foreach ($lines as $line_num => $line) {
        echo htmlspecialchars($line) . "<br>\n";
    }
}

function solve($lines)
{
    $str_max_len = 0;
    $max_line = " ";
    foreach ($lines as $line) {
        if (strlen($line) > $str_max_len): {
            $str_max_len = strlen($line);
            $max_line = $line;
        }
        endif;
    }
    return $max_line;
}

$file = "example.txt";
if (is_file($file)):
    $lines = file("example.txt");
    echo "<b>Входной файл:</b>" . "<br>\n";
    display($lines);
    $max_line = solve($lines);
    echo "<b>Строка наибольшей длины</b>" . "<br>\n";
    echo $max_line . "<br>";
else:echo "Файл $file не существует";
endif;
