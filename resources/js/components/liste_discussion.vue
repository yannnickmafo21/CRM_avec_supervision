<template>
    <div class = "container">
        <!--espace de recherche et de trie-->

        <div class="_div_recherche">
            <div class="zone_recherche">
                <img src="public/images/paperclip.png" alt="">
                <input type="text" class="input_recherche" placeholder="Rechercher">
            </div>
            <div>
                <button>
                    non lue
                </button>
                    En attente
                <button>

                </button>
            </div>
        </div>
        <!--liste des discussions en cours-->
        <div class="_div_discussion">

        </div>

    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
*{
    overflow: hidden;
}
.container{
    display: flex;
    flex-direction: column;
    height: 100%;
    width: 100%;


    ._div_recherche{
        height:20%;
        width: 100%;
        background-color: #f9f9f9;

        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;


            .zone_recherche{
                background-color: #dcdcdc;
                border-radius: 2em;
                width: 95%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                height: 2em;

                img{
                    height: 100%;
                    width: 2em;
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

    }

    ._div_discussion{
        height: 80%;
        width: 100%;
        background-color: aqua;
    }
}
</style>
