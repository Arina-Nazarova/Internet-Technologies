<?php
//Создать форму, позволяющую выбрать размер по названию предмета.
if (isset($_POST['land'])) {
    $size = htmlentities($_POST['land']);
    print 'Выбранный размер: ';
    switch ($size) {
        case 'Стол офисный':
            echo "110х75х60";
            break;
        case 'Стол обеденный':
            echo '230х75х80';
            break;
        case 'Стол журнальный':
            echo '120х41х65';
            break;
        case 'Стол детский':
            echo '70х55х60';
            break;
        case 'Стол складной':
            echo '60х90х38';
            break;
    }
}