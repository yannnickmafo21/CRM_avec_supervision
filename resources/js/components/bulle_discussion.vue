<template>
    <div class="bulle" ref="bulle" @click="ouvrir_tchat">
        <img src="/images/assistant.png" alt="" title="besoin d'assistance ?" >
    </div>

    <section class="espace_discussion" ref="espace_discussion" v-if="temoin">
        <button class="fermer_live" @click="fermer_tchat">X</button>
        <div class="_espace_message">
            <div
                v-for="(msg, index) in messages"
                :key="index"
                :class="msg.sender === 'client' ? 'div_message _div_message_envoyer' : 'div_message _div_message_recu'"
            >
                <img src="/images/circle-user-round.svg" alt="">
                <div :class="msg.sender === 'client' ? 'message_envoyer message' : 'message_recu message'">
                    {{ msg.text }}
                </div>
            </div>
        </div>
        <div class="_espace_saisie">
            <form class="formulaire" @submit.prevent="sendMessage">
                <input
                    type="text"
                    placeholder="Aa"
                    class="_input"
                    v-model="input_message_client"
                    id="input_message_client"
                >
                <img src="/images/paperclip.svg" alt="" class="_ajout">
                <img src="/images/smile.svg" alt="" class="_ajout">
                <button type="submit">
                    Envoyer
                </button>
            </form>
        </div>
    </section>

    <section class="espace_discussion" id="inscrip" ref="espace_discussion" v-else>
        <button class="fermer_live" @click="fermer_tchat">X</button>
        <div class="_espace_formulaire">
            <form @submit.prevent="inscrire">
                <p>
                    Veuillez remplir les champs suivants afin de débuter le Chat.
                </p>
                <div>
                    <input type='email' v-model="email" placeholder="adresse email" required>
                    <input type="password" placeholder="mot de passe" v-model="mot_de_passe" required>
                </div>
                <button type="submit">Soumettre</button>
            </form>
        </div>
    </section>
</template>

<style scoped>
#inscrip{
    height: 40vh;
}
._espace_formulaire{
    overflow: hidden;
    height: 60vh;
    width: 30vw;
    display: flex;
    form{
        text-align: justify;
        overflow: hidden;
        height: 100%;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 1.5em;
        padding: 4%;
        div{
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 1em;
            input{
                font-size: 1.2em;
                height: 2em;
                border: none;
                border-radius: 2em;
                padding-left: 0.5em;
                &:focus{
                    outline: none;
                }

            }

        }
        button{
            height: 2em;
            width: 8em;
            font-size: 1.1em;
            border-radius: 0.5em;
            &:hover{
                background-color: #e0e0e0;
            }
        }
    }
}

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
        .formulaire{
            background-color: #fff;
            align-items: center;
            display: flex;
            height: 2em;
            justify-content: space-between;
            border-radius: 2em;
            padding-right: 1em;
            gap:0.2em;
            width: 90%;
            button{
                padding: 0.5rem 1em;
                border-radius: 2em;
                overflow: hidden;
                width: 100%;
                height: 100%;
                background-color: green;
                border : none;
                color: white;
            }   
        }
        ._input{
            height: 2em;
            width: 100%;
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

const bulle = ref(null);
const espace_discussion = ref(null);
const temoin = ref(false);

const email = ref("");
const mot_de_passe = ref("");
const input_message_client = ref("");
const messages = ref([]);

const socket = io('http://localhost:2020');

// Réception des messages du serveur
socket.on('message_d_agent-technique', msg => {
    messages.value.push({ sender: "agent", text: msg });
});
socket.on('message_d_agent-client', msg => {
    messages.value.push({ sender: "agent", text: msg });
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

async function inscrire() {
   try {
        const response = await fetch('http://127.0.0.1:8000/inscrire', {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${token}`,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                email: email.value,
                mot_de_passe: mot_de_passe.value,
            })
        });

        if (!response.ok) {
            const errorText = await response.text();
            console.error('Erreur de connexion:', errorText);
            return;
        }

        const data = await response.json();
        localStorage.setItem('token', data.access_token);
        temoin.value = true;
    } catch (error) {
        console.error('Erreur lors de la connexion:', error);
    }
}

function ouvrir_tchat() {
    if (bulle.value && espace_discussion.value) {
        bulle.value.style.display = 'none';
        espace_discussion.value.style.display = 'flex';
    }
}

function fermer_tchat() {
    if (bulle.value && espace_discussion.value) {
        bulle.value.style.display = 'flex';
        espace_discussion.value.style.display = 'none';
    }
}

onMounted(() => {
    if (bulle.value && espace_discussion.value) {
        bulle.value.style.display = 'flex';
        espace_discussion.value.style.display = 'none';
    }
});

onMounted(async () =>{
    const token = localStorage.getItem('token');
    try{
        const response = await fetch("http://127.0.0.1:8000/api/prendre_client", {
        method: "GET",
        headers: {
            'Authorization': `Bearer ${token}`,
            "Accept": "application/json",
        }
    });

    if (!response.ok) throw new Error("Non autorisé");

    const data = await response.json();
    temoin.value = true;
    if(data.client == null) {
        console.error("Aucune donnée trouvée");
        temoin.value = false;

        return;
    }
    }   catch (e) {
        console.error(e);
        alert('Votre session a expirée')
    }
});
</script>
