<template>
    <div class="container">
        <!-- espace de recherche et de trie -->
        <div class="_div_recherche">
            <div class="zone_recherche">
                <img src="/images/search.svg" alt="">
                <input type="text" class="input_recherche" placeholder="Rechercher">
            </div>
            <div class="div_boutons">
                <button class="_boutons" @click="tier_non_lu" >Non lue</button>
                <button class="_boutons">En attente</button>
            </div>
        </div>
        <!-- liste des discussions en cours -->
        <div class="_div_discussion">
            <div v-for="(element, index) in tableau_filtrer"
                :key="index"
                class="personnes">

                <div class="requetes">

                    <div class="photo_profil">
                        <img :src="element.profil" alt="profil" />
                    </div>

                    <div class="infos">
                        <span class="profil_name">{{ element.profil_name }}</span>
                        <span class="texte">{{ element.message }}</span>
                    </div>

                    <div class="div_heure">
                        <span class="heure">2h</span>
                        <div :class="lu ? non_lu : lu ">
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const tableau = [
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Leo Mignon",
        "message": "vous êtes désormais ami aveheizghie",
        "lu": true
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Veron Kouam",
        "message": "vous êtes désormais ami avec",
        "lu": true
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Stevia Nguemene Manfo",
        "message": "vous êtes désormais ami avec",
        "lu": false
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Lëö Türâx Lëö Türâx",
        "message": "vous êtes désormais ami avec",
        "lu": false
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Blonde Brenda",
        "message": "vous êtes désormais ami avec",
        "lu": true
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Neyou Francisca",
        "message": "vous êtes désormais ami avec",
        "lu": false
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Duvan Tiakam",
        "message": "vous êtes désormais ami avec",
        "lu": true
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Francisca Neyou",
        "message": "vous êtes désormais ami avec",
        "lu": true
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Romaric Yelem",
        "message": "vous êtes désormais ami avec",
        "lu": false
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Zack Leo Nzogang",
        "message": "vous êtes désormais ami avec",
        "lu": false
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Jordan Donfack",
        "message": "vous êtes désormais ami avec",
        "lu": true
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Alexia Investissement",
        "message": "vous êtes désormais ami avec",
        "lu": false
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Mmerveille Tem",
        "message": "vous êtes désormais ami avec",
        "lu": false
    }
];

const tableau_filtrer = ref([...tableau]);

function tier_non_lu(){
    tableau_filtrer.value = tableau.filter(element => element.lu === false);
}
</script>

<style scoped>
.container{
    display: flex;
    flex-direction: column;
    height: 100%;
    width: 100%;


    ._div_recherche{
        height: fit-content;
        padding-top: 2%;
        padding-bottom: 2%;
        width: 100%;
        background-color: #ffffff;

        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
        gap: 0.5em;


            .zone_recherche{
                background-color: #dcdcdc;
                border-radius: 2em;
                width: 95%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                height: 2em;
                padding-left: 4%;

                img{
                    height: 1em;
                    width: 1em;
                }

                .input_recherche{
                background-color: #dcdcdc;
                border-radius:0em 2em 2em 0em;
                height: 90%;
                width: 100%;
                padding-left: 0.5em;
                border : none;
                    &:focus{
                        outline: none;
                    }
                }
            }

            .div_boutons{
                display: flex;
                justify-content: space-around;
                height: 2em;
                width: 100%;

                ._boutons{
                    border: none;
                    border-radius: 2em;
                    width: 40%;
                    background-color: #dcdcdc;
                    cursor: pointer;
                }
            }
    }

    /**liste des discussions */
    ._div_discussion{
        background-color: #4e4e4e;
        height: 100%;
        width: 100%;
        display: flex;
        flex-direction: column;
        overflow-y: auto;
        gap: 0.5em;
        padding-top: 1%;

        .requetes{
            display: grid;
            grid-template-columns: 0.5fr 1fr 1fr 0.5fr;
            grid-template-rows: 1fr 1fr 1fr 1fr;
            background-color: #bdbdbd;
            overflow: hidden;
            height: 3.5em;
            width: 96%;
            border-radius: 0.2em;
            margin-left: 2% ;
            .photo_profil{
                display: flex;
                justify-content: center;
                align-items: center;
                grid-row: 1/5;
                img{
                    height: 3em;
                    width: 3em;
                    border-radius: 50%;
                }
            }
            .infos{
                margin-left: 5%;
                white-space: nowrap;
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                grid-column: 2/4;
                grid-row: 1/5;
                overflow: hidden;
                .profil_name{
                    font-weight: bold;
                }
                .texte{
                    font-size: 0.7em;
                }
            }
            .div_heure{
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                grid-row: 1/5;
                align-items: center;
                padding: 0.5em;
                .non_lu{
                    background-color: red;
                    height: 0.5em;
                    width: 0.5em;
                    border-radius: 50%;
                }
                .lu{
                    background-color: rgb(0, 255, 47);
                    height: 0.5em;
                    width: 0.5em;
                    border-radius: 50%;
                }
                .heure{
                    font-size: 0.7em;
                }
            }
            &:hover{
                background-color: #a8a8a8;
                cursor: pointer;
            }
        }
}

}
</style>
