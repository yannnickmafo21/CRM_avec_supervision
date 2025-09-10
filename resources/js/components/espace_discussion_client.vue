<template>
    <section class="espace_discussion">
        <div class="_espace_bouton">
            <button class="_black">
                Mettre en attente
            </button>
            <div>
                Aujourd'hui
            </div>
            <button class="_green">
                Terminer
            </button>
        </div>

        <div class="_espace_message">
            <div
                v-for="(msg, index) in messages"
                :key="index"
                :class="msg.sender === 'client' ? '_div_message_client div_message' : '_div_message_agent div_message'"
            >
                <img src="/images/circle-user-round.svg" alt="">
                <div :class="msg.sender === 'client' ? 'message_client message' : 'message_agent message'">
                    {{ msg.text }}
                </div>
            </div>
        </div>

        <div class="_espace_saisie">
            <div>
                <input
                    v-model="input_message_agent" id="input_message_agent"
                    @keyup.enter="agent_envoyer_message"
                    type="text"
                    class="_input"
                    placeholder="Ecrire un message..."
                >
                <img src="/images/paperclip.svg" alt="" class="_ajout">
                <img src="/images/smile.svg" alt="" class="_ajout">
            </div>
        </div>
    </section>
</template>

<style scoped>
.espace_discussion{
    display: flex;
    flex-direction: column;
    height: 100%;

    ._espace_bouton{
        border-bottom:2px solid rgb(115, 115, 115);
        height: 2em;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1em;
        button{
            cursor: pointer;
            height: 2em;
            border: none;
            border-radius: 2.5em;
            padding: 0.5em;
            font-size: 1em;
            &:hover{
                box-shadow: 0px 2px 10px rgb(80, 80, 80);
                transform: scale(1.05);
                transition-duration: 0.3s;
            }
        }
        ._black{
            background-color: #000000;
            color:#fff;
        }
        ._green{
            background-color: rgb(31, 131, 102);
        }
    }

    ._espace_message{
        padding: 2%;
        overflow: auto;
        height: 100%;
            .div_message{
                display: flex;
                gap: 1em;
                max-width: 85%;
                clear: both;
                margin: 0.5em;
                img{
                    border: none;
                    height: 2em;
                    width: 2em;
                    border-radius: 2em;
                }
                .message{
                    overflow: visible;
                    padding: 2%;
                    width: fit-content;
                    height: 100%;
                    border-radius: 0.5em;
                }
            }
        }

        ._div_message_client{
            align-self: flex-start;
            .message_client{
                background-color: #fff;
            }
        }
        ._div_message_agent{
            float: right;
            align-self: flex-end;
            flex-direction: row-reverse;
            .message_agent{
                background-color: rgb(1, 84, 61);
                color: rgb(255, 255, 255);
            }
        }

    ._espace_saisie{
        align-self: flex-end;
        margin-bottom: 1em;
        width: 100%;
        height: 3em;
        display: flex;
        align-items: center;
        justify-content: center;
        div{
            background-color: #ffffff;
            display: flex;
            border-radius: 2em;
            justify-content: center;
            align-items: center;
            padding-right: 1em;
            width: 80%;
        }
        ._input{
            height: 2.5em;
            width: 100%;
            padding-left: 1em;
            border-radius: 2em 0em 0em 2em;
            border: none;
            outline: none;
        }
        ._ajout{
            height: 1.5em;
            width: 1.5em;
            margin: 0.5em;
            background-color: #fff;
            &:hover{
                border-radius: 50%;
                background-color: rgb(225, 225, 225);
            }
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
import { ref, onMounted } from 'vue';
import { io } from 'socket.io-client';

const socket = io('http://localhost:2020');

const input_message_agent = ref("");
const messages = ref([
    {
        sender: "agent",
        text: "Bienvenue dans le chat technique."
    }
]);

// Réception des messages du client
socket.on('message_client', function(msg){
    messages.value.push({
        sender: "client",
        text: msg
    });
});

socket.on('message_d_agent-technique', function(msg){
    messages.value.push({
        sender: "agent",
        text: msg
    });
});

// Envoi du message agent au serveur
function agent_envoyer_message() {
    if (input_message_agent.value.trim() !== "") {
        socket.emit('message_d_agent-client', input_message_agent.value);
        messages.value.push({
            sender: "agent",
            text: input_message_agent.value
        });
        input_message_agent.value = "";
    }
}
</script>
