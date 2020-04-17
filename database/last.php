<?php
//Вывести список студентов, получающих стипендию, превышающую среднее значение стипендии.

$connection_string = "host=localhost port=5432 dbname = university user=postgres password=vogula";
$link = pg_connect($connection_string) or die("Нет соединения с БД");
$query = "select * from university.web.student where stipend > (select avg(stipend) from university.web.student)";
$result = pg_query($link, $query);
if ($result){
    $rows = pg_num_rows($result);
    echo "<table><tr><th>Университет</th><th>Фамилия студента</th><th>Стипендия</th></tr>";
    for ($i = 0; $i < $rows; $i++){
        $row = pg_fetch_row($result);
        echo "<tr>";
        for ($j = 0; $j < 3; $j++){
            echo "<td>$row[$j]</td>";
        }
        echo "</tr>";
    }
}
$query = "select avg(stipend) from university.web.student";
$result = pg_query($link, $query);
if ($result){
    $rows = pg_num_rows($result);
    for ($i = 0; $i < $rows; $i++){
        $row = pg_fetch_row($result);
        echo "<h3>Средняя стипендия: $row[$i]</h3>";
    }
    pg_free_result($result);
}
pg_close($link);
