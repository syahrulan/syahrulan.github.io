<!-- Chatbot Start -->
<div class="chatbot-container">
    <div id="chatbot-messages">
        <!-- Pesan akan ditambahkan di sini oleh JavaScript -->
    </div>
    <div class="chatbot-input-area">
        <input id="chatbot-input" type="text" placeholder="Tulis pesan Anda...">
        <button id="send-message">Kirim</button>
    </div>
</div>

<!-- Chatbot End -->

<style>
/* Chatbot Styles */
/* Chat Container */
#chatbot-messages {
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding: 10px;
    height: 300px; /* Sesuaikan tinggi */
    overflow-y: auto;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Chatbot Message Styles */
.message-container {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.message-container.user {
    justify-content: flex-end; /* Pesan user ke kanan */
}

.message-container.chatbot {
    justify-content: flex-start; /* Pesan chatbot ke kiri */
}

.message-container img {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin: 0 10px;
}

.message {
    max-width: 70%;
    padding: 10px;
    border-radius: 10px;
    font-size: 14px;
    line-height: 1.5;
}

.message.user {
    background-color: #0078D7;
    color: white;
    border-top-right-radius: 0;
    text-align: left;
}

.message.chatbot {
    background-color: #f1f1f1;
    color: black;
    border-top-left-radius: 0;
    text-align: left;
}


</style>

