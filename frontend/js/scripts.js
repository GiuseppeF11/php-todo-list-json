const {createApp} = Vue;

createApp ({
    data() {
        return {
            todo_list: [],
        };
    },
    mounted() {
        axios
            .get('http://localhost/Boolean-Php/Lezione%2063-%20Database%20PHP/php-todo-list-json/backend/todo.php')
            .then((response) => {
                console.log(response.data)
                this.todo_list = response.data;
            });
    }

}).mount('#app');