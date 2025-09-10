<template>
        <div class="espace_profil">
            <div class="autres_services div">
                <div class="photo_profil div">
                <img src="" alt="">
                <p>
                </p>
            </div>
                <button>Notification</button>

                <button>Service technique</button>

                <button>Marcketing et Com</button>

                <button>PDG</button>
            </div>
            <div class="gestion_session div">
                <button class="_orange">
                    Mettre en veille
                </button>
                <button class="_red">
                    Fermer session
                </button>
            </div>
        </div>
</template>

<style scoped>
*{
    overflow: hidden;
    margin: 0px;
    padding: 0px;
}
.espace_profil{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    gap: 1%;
    background-color: rgb(16, 66, 51);
    height: 100%;
    width: 100%;
}

.div{
    display: flex;
    flex-direction: column;
    width: 100%;
}

.photo_profil{
    align-items: center;
    justify-content: center;
    margin-top: 2em;
    margin-bottom: 2em;
    img{
        height: 6em;
        width: 6em;
    }
}

.autres_services{
    button{
        background: rgb(31, 131, 78);
        max-width: 80%;
        height: 2.3em;
        border: none;
        margin-top: 4%;
        margin-right: 4%;
        border-radius: 0em 2em 2em 0em;
        font-size: 1.2em;
        text-align:center;
        text-decoration: underline;
        cursor: pointer;
        &:hover{
            font-weight: bold;
        }
    }
}

.gestion_session{
    button{
        width: 100%;
        height: 2.8em;
        font-size: 120%;
        cursor: pointer;
        border: none;
        outline: none;
    }
    ._red{
        background-color: rgb(227, 0, 0);
        &:hover{
            background-color: rgb(123, 0, 0);
        }
    }
    ._orange{
        background-color: orange;
        &:hover{
            background-color: rgb(175, 114, 0);
        }
    }
}
</style>

<script setup>

import { ref, onMounted } from 'vue';

const employe = ref(null);
const token = localStorage.getItem('token');

onMounted(async () =>{
    try{
        const response = await fetch("http://127.0.0.1:8000/api/prendre_employe", {
        method: "GET",
        headers: {
            'Authorization': `Bearer ${token}`,
            "Accept": "application/json",
        }
    });

    if (!response.ok) throw new Error("Non autorisé");

    employe.value = await response.json();
    console.log(employe.value);
    }   catch (e) {
        console.error(e);
        alert("Session expirée, reconnectez-vous !");
        window.location.href = "/connexion_agents";
    }
});
</script>
