<template>
<div class="container">
    <div class="mes_div logo_notch">
        <img src="/images/logo_notchpay.png" alt="">
    </div>
    <div class="mes_div formulaire">
        <h1>Connexion</h1>
        <form @submit.prevent="login">
            <p>Veiller saisir vos informations pour vous connecter à votre espace de travail</p>
            <div>
                <input type="text" v-model="nom"  id="nom" placeholder="Nom d'utilisateur" maxlength="25" required>
                <input type="password" v-model="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe" maxlength="8" required>
            </div>
            <a href="." class="lien_oubliés">Identifiants oubliés ?</a>
            <div>
                <button type="submit">
                    Soumettre
                </button>
            </div>
        </form>
    </div>
</div>
</template>

<style scoped>

.container{
    font-family: Arial, Helvetica, sans-serif;
    height: 100vh;
    width: 100vw;
    display: flex;
    align-items: center;
    justify-content: center;
    .mes_div{
        height: 100%;
        width: 100%;
        display: flex;
    }

    .formulaire{
        align-items: center;
        justify-content: center;
        flex-direction: column;
        form{
            max-width: 30em;
            text-align: center;
            margin: 1em;
            padding: 1em;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 1em;
            border: 0.2em solid rgb(31,131,102);
            border-radius: 1em;
            div{
                display: flex;
                flex-direction: column;
                gap: 1em;
                input{
                    height: 2.5em;
                    width: 25vw;
                    border-radius: 0.5em;
                    border: none;
                    padding-left: 1em;
                    background-color:  rgb(212, 223, 220);
                    border: 0.1em solid rgb(255, 255, 255);
                    font-size: 1em;

                    &:focus{
                        outline: none;
                        border: 0.1em solid rgb(53, 124, 104);
                    }
                }
                button{
                    height: 2.5em;
                    width: 10em;
                    border-radius: 0.5em;
                    border: none;
                    background-color: rgb(31,131,102);
                    color: white;
                    font-weight: bold;
                    cursor: pointer;
                }
            }
            .lien_oubliés{
                text-decoration: none;
                color: rgb(0, 134, 212);
                cursor: pointer;
            }

        }
    }

    .logo_notch{
        background-color: rgb(30, 146, 113);
        justify-content: center;
        align-items: center;
        padding: 1em;
        img{
            margin: 1em;
            border-radius: 50%;
            border: 0.2em solid rgb(23, 107, 83)
        }
    }
}

</style>

<script setup>
import { ref } from 'vue'

const nom = ref('')
const mot_de_passe = ref('')

async function login() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  try {
    const response = await fetch('http://127.0.0.1:8000/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken
      },
      body: JSON.stringify({
        nom: nom.value,
        mot_de_passe: mot_de_passe.value
      })
    })

    if (!response.ok) {
      const errorText = await response.text()
      console.error('Erreur de connexion:', errorText)
      return
    }

    const data = await response.json()
    console.log('Connexion réussie ', data)

    // Sauvegarde du token JWT
    localStorage.setItem('token', data.access_token)

    window.location.href = '/service_client'

  } catch (error) {
    console.error('Erreur lors de la connexion:', error)
  }
}
</script>

