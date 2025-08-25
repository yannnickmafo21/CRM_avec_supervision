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
            <div class="_div_message_client div_message">
                <img src="/public/images/circle-user-round.svg" alt="">
                <div class="message_client message">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum, veniam excepturi veritatis sint nemo deleniti consectetur repellat expedita nisi aliquam similique sed et aperiam reiciendis accusantium? Ab, ipsum? Quaerat, vitae.
                </div>
            </div>

            <div class="_div_message_agent div_message">
                <img src="/public/images/circle-user-round.svg" alt="">
                <div class="message_agent message">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum, veniam excepturi veritatis sint nemo deleniti consectetur repellat expedita nisi aliquam similique sed et aperiam reiciendis accusantium? Ab, ipsum? Quaerat, vitae.
                </div>
            </div><div class="_div_message_agent div_message">
                <img src="/public/images/circle-user-round.svg" alt="">
                <div class="message_agent message">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum, veniam excepturi veritatis sint nemo deleniti consectetur repellat expedita nisi aliquam similique sed et aperiam reiciendis accusantium? Ab, ipsum? Quaerat, vitae.
                </div>
            </div><div class="_div_message_agent div_message">
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

<style>
.espace_discussion{
    display: flex;
    flex-direction: column;
    height: 100%;

    ._espace_bouton{
        border-bottom:2px solid rgb(107, 107, 107);
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
            background-color: black;
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
            padding-right: 1em;
            width: 95%;
        }
        ._input{
            height: 2.5em;
            width: 100%;
            padding-left: 1em;
            border-radius: 2em 0em 0em 2em;
            border: none;
        }
        ._ajout{
            height: 1em;
            width: 1em;
        }
    }
}

::-webkit-scrollbar-thumb:hover{
    background: rgb(113, 113, 113);
    border-radius: 2em;
}
::-webkit-scrollbar{
    background: rgb(207, 207, 208);
}
</style>

<script>
import { ScrollSpy } from 'bootstrap';

    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<script setup>
</script>

