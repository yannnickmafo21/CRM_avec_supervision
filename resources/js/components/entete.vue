<template>
        <div class="entete">
            <img src="" alt="">
            <button>
                Transférer la discussion
            </button>
       </div>
</template>

<style>
.entete{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-left: 2%;
    padding-right: 4%;
    width: 100%;
    img{
        height: 5em;
        width: 5em;
        border-radius: 2em;
    }
    button{
        font-size: 1em;
        border-radius: 5px;
        padding: 1%;
        border: none;
        cursor: pointer;
        background-color: #fff;
        &:hover{
            background-color: rgb(0, 204, 51);
            transition-duration: 0.5s;
        }
    }

}
</style>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
