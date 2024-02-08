<?php
// Prendo i file dal API crata come json
$todo_list_json = file_get_contents('./db/todo.json');

// Traduco la lista json in lista PHP
$todo_list = json_decode($todo_list_json, true);

header('Content-Type: application/json');

echo json_encode($todo_list);
