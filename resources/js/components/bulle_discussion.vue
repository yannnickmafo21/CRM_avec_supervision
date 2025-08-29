<template>
    <div class="bulle" ref="bulle" @click="ouvrir_tchat">
        <img src="/images/chat.svg" alt="" >
    </div>

    <section class="espace_discussion" ref="espace_discussion">
        <button class="fermer_live" @click="fermer_tchat">
            X
        </button>
        <div class="_espace_message">
            <div
                v-for="(msg, index) in messages"
                :key="index"
                :class="msg.sender === 'client' ? 'div_message _div_message_envoyer ' : 'div_message _div_message_recu'"
            >
                <img src="/images/circle-user-round.svg" alt="">
                <div :class="msg.sender === 'client' ? 'message_envoyer message' : 'message_recu message'">
                    {{ msg.text }}
                </div>
            </div>
        </div>
        <div class="_espace_saisie">
            <div>
                <form class="formulaire" @submit.prevent="sendMessage">
                    <input
                        type="text"
                        placeholder="Aa"
                        class="_input"
                        v-model="input_message_client" id="input_message_client"
                    >
                    <img src="/images/paperclip.svg" alt="" class="_ajout">
                    <img src="/images/smile.svg" alt="" class="_ajout">
                    <button type="submit" @click="sendMessage">
                        Envoyer
                    </button>
                </form>
            </div>
        </div>
    </section>
</template>

<style scoped>
*{
    font-family: sans-serif;
}

.bulle{
    background-color: #2a0e0e;
    height: 3em;
    width: 3em;
    border-radius: 4em;
    display: flex;
    justify-content: center;
    position: absolute;
    bottom: 1em;
    right: 1em;
    img{
        height: 100%;
        width: 100%;
        object-fit: cover;
        border-radius: 4em;
    }
}

.fermer_live{
    height: 4em;
    border-radius: 2em;
    border: none;
    position: absolute;
    right: 50%;
    width: 2em;
    height: 2em;
    background: #c2c2c2;
    font-weight: bolder;
    &:hover{
        background-color: #000000;
        color: white;
    }
}

.espace_discussion{
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    height: 60vh;
    max-width: 30vw;
    background:linear-gradient(white,#b3b3b3) ;
    border-radius: 1em 1em 0em 1em;
    position: absolute;
    bottom: 2%;
    right: 1%;

    ._espace_message{
        padding: 2%;
        overflow: auto;
        height: 100%;

        /**style pour tout les messages envoyés et reçus */
        .div_message{
            display: flex;
            gap: 0.5em;
            max-width: 85%;
            clear: both;
            margin: 0.5em;
            flex-direction: row-reverse;
            img{
                border: none;
                height: 2em;
                width: 2em;
                border-radius: 2em;
            }

            .message{
                overflow: visible;
                padding: 4%;
                width: fit-content;
                height: 100%;
                border-radius: 0.5em;
            }

            /** style pour les messages envoyés */
            .message_envoyer{
                background-color: rgb(1, 84, 61);
                color: white;
            }

            /** style pour les messages reçus */
            .message_recu{
                background-color: rgb(255, 255, 255);
                color: black;
            }
        }
        /**style pour les div de messages envoyés */
        ._div_message_envoyer{
            flex-direction: row-reverse;
            float: right;
        }

        /**style pour les div de messages reçus */
        ._div_message_recu{
            flex-direction: row;
            float: left;
        }
    }

    ._espace_saisie{
        border-top:2px solid rgb(107, 107, 107);
        padding-top: 2%;
        align-self: flex-end;
        margin-bottom: 1em;
        width: 100%;
        height: 3em;
        display: flex;
        align-items: center;
        justify-content: center;
        div{
            border:none;
            width: 90%;
            background-color: white;
            border-radius: 2em;
            .formulaire{
                display: flex;
                border-radius: 2em;
                justify-content: space-between;
                align-items: center;
                padding-right: 1em;
                width: 100%;
                button{
                    padding: 0.5rem 1em;
                    border-radius: 2em;
                    overflow: hidden;
                    height: 100%;
                    background-color: green;
                    border : none;
                    color: white;
                }
            }
        }
        ._input{
            height: 2em;
            width: 70%;
            padding-left: 1em;
            border-radius: 2em 0em 0em 2em;
            border: none;
            outline: none;
        }
        ._ajout{
            height: 1em;
            width: 1em;
        }
    }
}

::-webkit-scrollbar-thumb{
    background: rgb(74, 74, 74);
    border-radius: 2em;
    width: 5em;
}

::-webkit-scrollbar{
    width: 0.5em;
}
</style>

<script setup>
import { ref, onMounted } from 'vue'
// Importe le client Socket.io (assure-toi d’avoir installé socket.io-client)
import { io } from 'socket.io-client'

const bulle = ref(null);
const espace_discussion = ref(null);

const socket = io('http://localhost:2020');

const input_message_client = ref("");
const messages = ref([]);

// Réception des messages du serveur
socket.on('message_d_agent-technique', function(msg){
    messages.value.push({
        sender: "agent",
        text: msg
    });
});

socket.on('message_d_agent-client', function(msg){
    messages.value.push({
        sender: "agent",
        text: msg
    });
});


// Envoi du message au serveur
function sendMessage() {
    if(input_message_client.value.trim() !== "") {
        socket.emit('message_client', input_message_client.value);
        messages.value.push({
            sender: "client",
            text: input_message_client.value
        });
        input_message_client.value = '';
    }
}
function ouvrir_tchat() {
    if (bulle.value && espace_discussion.value) {
        bulle.value.style.display = 'none';
        espace_discussion.value.style.display = 'flex';
    }
}

onMounted(() => {
    if (bulle.value && espace_discussion.value) {
        bulle.value.style.display = 'flex';
        espace_discussion.value.style.display = 'none';
    }
});
</script>
