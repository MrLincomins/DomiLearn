<?php require_once "layout/header.php"; ?>
<body>
<div class="container" id="app">
    <div class="user-list">
        <h2>Выберите пользователя:</h2>
        <ul>
            <li v-for="user in users" @click="selectUser(user.id)">{{ user.name }}</li>
        </ul>
    </div>
    <div class="card">
        <div class="chat">
            <h2 v-if="selectedUser">Чат с {{ selectedUser }}</h2>
            <div class="chat-messages" ref="messageContainer">
                <div v-for="message in messages" class="message">
                    <div class="message-name">{{ message.sender }}</div>
                    <div class="message-content">{{ message.message }}</div>
                </div>
            </div>
            <div class="chat-input">
                <input v-model="newMessage" @keyup.enter="sendMessage" placeholder="Введите сообщение">
                <button @click="sendMessage">Отправить</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
<script>
    const app = new Vue({
        el: '#app',
        data: {
            users: <?php echo json_encode($users); ?>,
            selectedUser: null,
            messages: [],
            newMessage: '',
        },
        mounted() {

            setInterval(() => {
                this.fetchMessages();
            }, 2000);
        },
        methods: {
            selectUser(userId) {
                this.selectedUser = this.users.find(user => user.id === userId).name;
            },
            fetchMessages() {
                if (this.selectedUser) {
                    const recipientUserId = this.users.find(user => user.name === this.selectedUser).id;

                    axios.post('/chat/get', {recipientId: recipientUserId})
                        .then(response => {
                            this.messages = response.data;

                        })

                        .catch(error => {
                            console.error('Ошибка при получении сообщений:', error);
                        });
                }
            },
            sendMessage() {
                if (this.newMessage.trim() !== '') {
                    const recipientUserId = this.users.find(user => user.name === this.selectedUser).id;

                    axios.post('/chat/send', {message: this.newMessage, recipientId: recipientUserId})
                        .then(response => {
                            console.log('Сообщение успешно отправлено');
                            this.newMessage = '';
                            this.fetchMessages();
                        })
                        .catch(error => {
                            console.error('Ошибка при отправке сообщения:', error);
                        });
                }
            },
        },
    });
</script>
<style>

    .container {
        display: flex;
        width: 100%;
        height: 100%;
    }

    .user-list {
        width: 30%;
        background-color: #fff;
        padding: 20px;
        border-right: 1px solid #ccc;
        overflow-y: auto;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    li {
        cursor: pointer;
        margin-bottom: 10px;
    }

    li:hover {
        text-decoration: underline;
    }

    .message {
        margin: 5px 0;
        padding: 5px;
        border: 1px solid #ccc;
        background-color: #f0f0f0;
    }

    .chat {
        display: flex;
        flex-direction: column;
        height: 80vh;
    }

    .chat-messages {
        flex-grow: 1;
        overflow-y: auto;
        border: 1px solid #ccc;
        padding: 10px;
        max-height: calc(100vh - 150px);
    }

    .chat-input {
        background-color: #f0f0f0;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .chat-input input {
        flex-grow: 1;
        margin-right: 10px;
    }
</style>
</body>
<?php require_once "layout/footer.php"; ?>


