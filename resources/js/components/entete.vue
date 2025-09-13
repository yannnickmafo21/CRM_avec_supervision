<template>
        <div class="entete">
            <div class="logo">
                <img src="/images/logo_notchpay.png" alt="">
            </div>
            <button>
                Transférer la discussion
            </button>
       </div>
</template>

<style scoped>
.entete{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-left: 2%;
    width: 100%;
    .logo{
        width: fit-content;
    }
    img{
        height: 5em;
        width: 5em;
        border-radius: 2em;
    }
    button{
        margin-right: 5%;
        font-size: 1em;
        border-radius: 5px;
        padding: 1%;
        border: none;
        cursor: pointer;
        background-color: #fff;
        &:hover{
            background-color: rgb(0, 107, 63);
            transition-duration: 0.3s;
            color: white;
        }
    }

}
</style>

<script setup>
</script>
