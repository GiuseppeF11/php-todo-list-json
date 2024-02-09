<?php 

    if (isset($_POST['todo'])) {
        //Recupero la lista originale dal JSON
        $todo_list_json = file_get_contents('./db/todo.json');

        //Trasformo la stringa Json in un array associativo per PHP (con true esce un array associativo, con false un oggetto)
        $todo_list_php = json_decode($todo_list_json, true);

        //Creo il nuovo elemento dell'array con due chiavi, il suo testo viene preso tramite $_Post (dall'index)
        $new_todo = [
            'todo'  => $_POST['todo'],
            'done'  => false,
        ];

        //Pusho dentro la lista degli array
        $todo_list_php[] = $new_todo;

        //Codifico di nuovo l'array di PHP in una stringa JSON così da poterlo dimandare al database
        $todo_list_php = json_encode($todo_list_php);

        //Metto la stringa JSON nel database
        file_put_contents('db/todo.json', $todo_list_php);


        echo json_encode([
            'message' => 'OK',
            'code' => 200,
        ]);
    }
    else {
        echo json_encode([
            'message' => 'Dati non validi!',
            'code' =>400,
        ]);
    }
?>