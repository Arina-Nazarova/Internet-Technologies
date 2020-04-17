<?php

//Получить список студентов, проживающих в Воронеже и не получающих стипендию.

$connection_string = "host=localhost port=5432 dbname = university user=postgres password=vogula";
$link = pg_connect($connection_string) or die("Нет соединения с БД");
$query = "select * from university.web.student where university.web.student.city = 036 and university.web.student.grant = null  ";
$result = pg_query($link, $query);
if ($result){
    $rows = pg_num_rows($result);
    echo "<table><tr><th>ID города</th><th>ID студента</th><th>Имя студента</th><th>Фамилия студента</th><th>Стипендия</th>";
    for ($i = 0; $i < $rows; $i++){
        $row = pg_fetch_row($result);
        echo "<tr>";
        for ($j = 0; $j < 5; $j++){
            echo "<td>$row[$j]</td>";
        }
        echo "</tr>";
    }
    pg_free_result($result);
}
pg_close($link);
