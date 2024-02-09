const {createApp} = Vue;

createApp ({
    data() {
        return {
            todo_list: [],
            newTodo: '',
        };
    },
    created() {
        axios
            .get('http://localhost/Boolean-Php/Lezione%2063-%20Database%20PHP/php-todo-list-json/backend/todo.php')
            .then((response) => {
                console.log(response.data)
                this.todo_list = response.data;
            });
    },
    methods: {
        add_todo() {
            axios
                .post('http://localhost/Boolean-Php/Lezione%2063-%20Database%20PHP/php-todo-list-json/backend/create_todo.php',
                    {
                        todo: this.newTodo
                    },
                    {
                        //Indichiamo ad axios che questa richiesta simula una sottomissione di form
                        headers: {'Content-Type' : 'multipart/form-data'}
                    }
                )
                .then(response => {
                    console.log(response);
                    if (response.data.code == 200) {
                        this.todo_list.push({
                            todo: this.newTodo,
                            done: false
                        })

                        this.newTodo = '';
                    }
                    else {
                        alert('Dati non validi!');
                    }
                })
        }
    },
}).mount('#app');