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
                    <img src="/public/images/circle-user-round.svg" alt="">
                    <div :class="msg.sender === 'agent' ? 'message_envoyer' : 'message_recu'">
                        {{ msg.text }}
                    </div>
                </div>
            </div>

            <div class="_espace_saisie">
                <div>
                    <form class="formulaire" @submit.prevent="agent_envoyer_message">
                        <input
                            type="text"
                            placeholder="Aa"
                            class="_input"
                            v-model="input_message_agent"
                        >
                        <img src="/public/images/paperclip.svg" alt="" class="_ajout">
                        <img src="/public/images/smile.svg" alt="" class="_ajout">
                        <button type="submit">
                            Envoyer
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <!--bloc client-->
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
                    :class="msg.sender === 'client' ? 'div_message _div_message_envoyer ' : 'div_message _div_message_recu'"
                >
                    <img src="/public/images/circle-user-round.svg" alt="">
                    <div :class="msg.sender === 'client' ? 'message_envoyer' : 'message_recu'">
                        {{ msg.text }}
                    </div>
                </div>
            </div>

            <div class="_espace_saisie">
                <div>
                    <form class="formulaire" @submit.prevent="client_envoyer_message">
                        <input
                            type="text"
                            placeholder="Aa"
                            class="_input"
                            v-model="input_message_client"
                        >
                        <img src="/public/images/paperclip.svg" alt="" class="_ajout">
                        <img src="/public/images/smile.svg" alt="" class="_ajout">
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
            margin: 0.5em;
            flex-direction: row-reverse;
            img{
                border: none;
                height: 2em;
                width: 2em;
                border-radius: 2em;
            }

            /** style pour les messages envoyés */
            .message_envoyer{
                padding: 2%;
                width: fit-content;
                height: 100%;
                border-radius: 0.5em;
                background-color: rgb(0, 161, 94);
            }

            /** */
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

<script>
export default {
    data() {
        return {
            input_message_agent: "",
            input_message_client: "",
            messages: [
                {
                    sender: "agent",
                    text: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum, veniam excepturi veritatis sint nemo deleniti consectetur repellat expedita nisi aliquam similique sed et aperiam reiciendis accusantium? Ab, ipsum? Quaerat, vitae."
                },
                {
                    sender: "agent",
                    text: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum, veniam excepturi veritatis sint nemo deleniti consectetur repellat expedita nisi aliquam similique sed et aperiam reiciendis accusantium? Ab, ipsum? Quaerat, vitae."
                },
                {
                    sender: "agent",
                    text: "Lorem, ip"
                },
                {
                    sender: "client",
                    text: "adipisicing elit. Dolorum, veniam excepturi veritatis sint nemo deleniti consectetur repellat expedita nisi aliquam similique sed et apeiam reiciendis accusantium? Ab, ipsum? Quaerat, vitae."
                },
                {
                    sender: "client",
                    text: "adipisicing elit. Dolorum, "
                },
            ],
        };
    },
    methods: {
        agent_envoyer_message() {
            if (this.input_message_agent.trim() !== "") {
                this.messages.push({
                    sender: "agent",
                    text: this.input_message_agent,
                });
                this.input_message_agent = "";
            }
        },

        client_envoyer_message() {
            if (this.input_message_client.trim() !== "") {
                this.messages.push({
                    sender: "client",
                    text: this.input_message_client,
                });
                this.input_message_client = "";
            }
        }
    }
};
</script>

