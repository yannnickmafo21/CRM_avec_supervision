<template>
    <div class="container">
        <!-- espace de recherche et de trie -->
        <div class="_div_recherche">
            <div class="zone_recherche">
                <img src="/images/search.svg" alt="">
                <input type="text" class="input_recherche" placeholder="Rechercher" id="input_recherche" @input="search"/>
            </div>
            <div class="div_boutons">
                <button class="_boutons" @click="trier_non_lu" >Non lue</button>
                <button class="_boutons" @click="trier_en_attente">En attente</button>
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
                        <div :class="element.status ? 'lu' : 'non_lu' ">
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const tableau = ref([
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Leo Mignon",
        "message": "vous êtes désormais ami aveheizghie",
        "status": true
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Veron Kouam",
        "message": "vous êtes désormais ami avec",
        "status": true
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Stevia Nguemene Manfo",
        "message": "vous êtes désormais ami avec",
        "status": false
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Lëö Türâx Lëö Türâx",
        "message": "vous êtes désormais ami avec",
        "status": false
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Blonde Brenda",
        "message": "vous êtes désormais ami avec",
        "status": "waiting"
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Neyou Francisca",
        "message": "vous êtes désormais ami avec",
        "status": false
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Duvan Tiakam",
        "message": "vous êtes désormais ami avec",
        "status": true
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Francisca Neyou",
        "message": "vous êtes désormais ami avec",
        "status": "waiting"
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Romaric Yelem",
        "message": "vous êtes désormais ami avec",
        "status": false
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Zack Leo Nzogang",
        "message": "vous êtes désormais ami avec",
        "status": false
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Jordan Donfack",
        "message": "vous êtes désormais ami avec",
        "status": "waiting"
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Alexia Investissement",
        "message": "vous êtes désormais ami avec",
        "status": true
    },
    {
        "profil": "/images/circle-user-round.svg",
        "profil_name": "Mmerveille Tem",
        "message": "vous êtes désormais ami avec",
        "status": false
    }
]);

const tableau_filtrer = ref([...tableau.value]);
const filtre_non_lu = ref(false);
const filtre_en_attente = ref(false);
const searchText = ref("");

function trier_non_lu(){
    filtre_non_lu.value = !filtre_non_lu.value;
    filtre_en_attente.value = false;
    applyFilters();
}

function trier_en_attente(){
    filtre_en_attente.value = !filtre_en_attente.value;
    filtre_non_lu.value = false;
    applyFilters();
}

function search(event){
    searchText.value = event.target.value;
    applyFilters();
}

function applyFilters() {
    let result = [...tableau.value];
    if (filtre_non_lu.value) {
        result = result.filter(element => element.status === false);
    }
    if (filtre_en_attente.value) {
        result = result.filter(element => element.status === "waiting");
    }
    if (searchText.value.trim() !== "") {
        result = result.filter(element =>
            element.profil_name.toLowerCase().includes(searchText.value.trim().toLowerCase())
        );
    }
    tableau_filtrer.value = result;
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
        padding-bottom: 3%;

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
                    background-color: rgb(6, 137, 30);
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
