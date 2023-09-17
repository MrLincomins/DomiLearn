<?php require_once "layout/header.php"; ?>
<body>
<div class="container">
<div class="todo-container mt-4">
    <h1 class="mt-1">To-Do List</h1>
    <div class="input-style-1 mt-1">
        <label>Название задачи</label>
        <input type="text" id="taskInput" placeholder="Добавить новую задачу">
    </div>
    <a onclick="addTask()" class="main-btn primary-btn rounded-full btn-hover">Добавить</a>
    <ul class="mt-4" id="task-list"></ul>
</div>
</div>
</body>


<script>
    const taskList = document.getElementById('task-list');
    const taskInput = document.getElementById('taskInput');

    fetch('/todo/show')
        .then(response => response.json())
        .then(data => {
            renderTasks(data.tasks);
        })
        .catch(error => {
            console.error('Ошибка при загрузке списка задач:', error);
        });

    function renderTasks(tasks) {
        taskList.innerHTML = '';
        tasks.forEach(task => {
            const li = document.createElement('li');
            li.innerHTML = `
                    <input class="radio-success" id="radio-3" type="radio" onchange="toggleTask(${task.id})" ${task.state === 'completed' ? 'checked' : ''}>
                    <span class="${task.state === 'completed' ? 'completed' : ''}">${task.task}</span>
                    <button class="button btn-sm danger-btn btn-hove" onclick="deleteTask(${task.id})">Удалить</button>
                `;
            taskList.appendChild(li);
        });
    }

    function addTask() {
        const taskText = taskInput.value.trim();
        if (taskText !== '') {
            fetch('/todo/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ task: taskText }),
            })
                .then(response => response.json())
                .then(data => {
                    renderTasks(data.tasks);
                    taskInput.value = '';
                })
                .catch(error => {
                    console.error('Ошибка при добавлении задачи:', error);
                });
        }
    }

    function toggleTask(id) {
        fetch('/todo/toggle', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ id: id }),
        })
            .then(response => response.json())
            .then(data => {
                renderTasks(data.tasks);
            })
            .catch(error => {
                console.error('Ошибка при отметке задачи как выполненной:', error);
            });
    }

    function deleteTask(id) {
        fetch('/todo/delete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ id: id }),
        })
            .then(response => response.json())
            .then(data => {
                renderTasks(data.tasks);
            })
            .catch(error => {
                console.error('Ошибка при удалении задачи:', error);
            });
    }
</script>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
    }

    .todo-container {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    h1 {
        text-align: center;
    }

    ul {
        list-style: none;
        padding: 0;
    }


    input[type="radio"] {
        margin-right: 10px;
    }

    .completed {
        text-decoration: line-through;
        color: #28a745;
    }
</style>
<?php require_once "layout/footer.php"; ?>
