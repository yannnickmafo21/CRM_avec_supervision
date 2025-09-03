<template>
<section class="container">
    <div class="form-container">
        <h1>Ajouter un employé</h1>
        <form enctype="multipart/form-data" action="/ajout_employer" method="GET">
            <div class="profil_choix">
                <img :src="image" alt="">
                <input type="file" name="photo" accept="image/*">
            </div>
            <div class="info_employe">
                <input type="text" name="nom"  placeholder="nom" required>
                <input type="email" name="email" placeholder="email" required>
                <input type="text" name="prenom" placeholder="prenom" required>
                <input type="tel" name="phone" placeholder="téléphone" required>
                <input type="text" name="domicile" placeholder="domicile" required>
                <select name="sexe" id="">
                    <option value="masculin">Masculin</option>
                    <option value="feminin">Feminin</option>
                </select>
            </div>
            <button class="soumettre" type="submit">Ajouter</button>
            <button class="annuler" @click="annuler">Annuler</button>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
</section>
</template>

<style scoped>
*{font-family: Roboto, sans-serif; overflow: hidden;}
.container{
    background-color: #f5f5f5;
    height: 100vh;
    width: 100vw;
    display: flex;
    justify-content: center;
    align-items: center;
}

.form-container{
    border: 0.2em solid #0f876f;
    background-color: #fff;
    padding: 20px;
    border-radius: 5%;
    max-width: 60%;
    display: flex;
    flex-direction: column;
    align-items: center;
    form{
        display: flex;
        flex-direction: column;
        align-items: center;
        div{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            img{
                height: 100px;
                width: 100px;
                border-radius: 50%;
                background-color: #f9f9f9;
                padding: 10px;
                &:invalid:not(:focus){
                    border: 1px solid red;
                }
            }
            input[type="file"]{
                margin-top: 10px;
                border: none;
                outline: none;
                text-decoration: none;
            }
        }
        .info_employe{
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin: 20px 0px;
            input, select{
                padding: 10px;
                border-radius: 5px;
                border: none;
                outline: none;
                border: 0.1px solid #15b091;
            }
        }
        button{
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
            border: none;
            outline: none;
            cursor: pointer;
        }
        .soumettre{
            background-color: #15b091;
            &:hover{
            background-color: #11876f;
            color: #fff;
            }
        }
        .annuler{
            background-color: #ff4d4d;
            color: #fff;
            &:hover{
            background-color: #cd4040;
            color: #fff;
            }
        }
    }
}
</style>

<script setup>
    import { ref } from 'vue';

    const image = ref('images/user-round-plus.svg');

    function annuler(){
        window.location.href = '/interface_supervision';
    }
</script>
