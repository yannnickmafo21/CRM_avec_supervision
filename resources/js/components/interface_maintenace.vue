<template>
    <section class="conteneur">
        <!--bloc agent-->
        <section class="espace_discussion">
            <div class="_espace_bouton">
                <button class="_green">
                    Terminer
                </button>
            </div>

            <div class="_espace_message">
                <div
                    v-for="(msg, index) in messages"
                    :key="index"
                    :class="msg.sender === 'agent' ? 'div_message _div_message_envoyer' : 'div_message _div_message_recu'"
                >
                    <img src="/images/circle-user-round.svg" alt="">
                    <div :class="msg.sender === 'agent' ? 'message_envoyer message' : 'message_recu message'">
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
                            v-model="input_message_agent" id="input_message_agent"
                        >
                        <img src="/images/paperclip.svg" alt="" class="_ajout">
                        <img src="/images/smile.svg" alt="" class="_ajout">
                        <button type="submit">
                            Envoyer
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </section>
</template>

<style scoped>

*{font-family: sans-serif;}

.conteneur{
    display: flex;
    gap: 0.5em;
}

.espace_discussion{
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    height: 90vh;
    width: 40vw;
    background:linear-gradient(white,#b3b3b3) ;
    border-radius: 1em;

    ._espace_bouton{
        border-bottom:2px solid rgb(107, 107, 107);
        height: 2em;
        display: flex;
        justify-content: center;
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
        ._green{
            background-color: rgb(0, 0, 0);
            color: white;
        }
    }

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
                color:white;
            }

            /** style pour les messages reçus */
            .message_recu{
                padding: 2%;
                width: fit-content;
                height: 100%;
                border-radius: 0.5em;
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
import { io } from 'socket.io-client'

const socket = io('http://localhost:2020');

const input_message_agent = ref("");
const messages = ref([]);

function sendMessage() {
    if(input_message_agent.value.trim() !== "") {
        socket.emit('message_d_agent-technique', input_message_agent.value);
        messages.value.push({
            sender: "agent",
            text: input_message_agent.value
        });
        input_message_agent.value = "";
    }
}

// Réception des messages du serveur
socket.on('message_client', function(msg){
    console.log("Message du client:", msg);
    messages.value.push({
        sender: "client",
        text: msg,
    });
});
</script>

