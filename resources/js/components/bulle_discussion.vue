<template>
    <div class="bulle" ref="bulle" @click="ouvrir_tchat">
        <img src="/public/images/chat.svg" alt="" style="height: 1.5em; width: 1.5em;">
    </div>
    <section class="espace_discussion" ref="espace_discussion">
        <button class="fermer_live" @click="fermer_tchat">
            X
        </button>
        <div class="_espace_message">
            <div class="_div_message_agent div_message">
                <img src="/public/images/circle-user-round.svg" alt="">
                <div class="message_client message">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum, veniam excepturi veritatis sint nemo deleniti consectetur repellat expedita nisi aliquam similique sed et aperiam reiciendis accusantium? Ab, ipsum? Quaerat, vitae.
                </div>
            </div>
            <div class="_div_message_client div_message">
                <img src="/public/images/circle-user-round.svg" alt="">
                <div class="message_agent message">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum, veniam excepturi veritatis sint nemo deleniti consectetur repellat expedita nisi aliquam similique sed et aperiam reiciendis accusantium? Ab, ipsum? Quaerat, vitae.
                </div>
            </div>

            <div class="_div_message_agent div_message">
                <img src="/public/images/circle-user-round.svg" alt="">
                <div class="message_agent message">
                    Lorem, ip
                </div>
            </div>
        </div>

        <div class="_espace_saisie">
            <div>
                <input type="text" placeholder="Aa" class="_input">
                <img src="/public/images/paperclip.svg" alt="" class="_ajout">
                <img src="/public/images/smile.svg" alt="" class="_ajout">
            </div>
        </div>
    </section>
</template>

<style scoped>
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
.bulle{
    height: 3em;
    width: 3em;
    border: none;
    border-radius: 3em;
    background-color: blue;
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    cursor: pointer;
    position: absolute;
    right: 2%;
    bottom: 2%;
}

.espace_discussion{
    display: flex;
    flex-direction: column;
    height: 60%;
    width: 25%;
    position: absolute;
    right: 2%;
    bottom: 2%;
    background: linear-gradient(rgb(251, 251, 251), rgb(176, 176, 176));
    border-radius: 0.5em 0.5em 0em 0.5em;

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
                padding: 2%;
                width: fit-content;
                height: 100%;
                border-radius: 0.5em;
            }
        }
    }

    ._div_message_client{
        align-self: flex-start;
        .message_agent{
            background-color: #fff;
        }
    }
    ._div_message_agent{
        float: right;
        align-self: flex-end;
        flex-direction: row-reverse;
        .message_client{
            background-color: rgb(31, 131, 102);
            color: rgb(255, 255, 255);
        }
    }

    ._espace_saisie{
        align-self: flex-end;
        margin-bottom: 0.5em;
        width: 100%;
        height: 3em;
        display: flex;
        align-items: center;
        justify-content: center;
        div{
            display: flex;
            border-radius: 2em;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            width: 85%;
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
            height: 1em;
            width: 1em;
        }
    }
}

::-webkit-scrollbar{
    display: none;
}
</style>

<script setup>
import { ref, onMounted } from 'vue';

const bulle = ref(null);
const espace_discussion = ref(null);

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

</script>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
