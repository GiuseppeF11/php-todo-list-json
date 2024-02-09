<?php
// Prendo i file dal API crata come json
$todo_list_json = file_get_contents('./db/todo.json');

//Comunico che il file è di tipo Json
header('Content-Type: application/json');

//Fisso nella risposta la lista del json
echo $todo_list_json;

//In questo caso non è necessario codificare o decodificare
