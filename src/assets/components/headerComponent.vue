<script setup>
import { RouterLink } from 'vue-router';
</script>   
<template>
    <header> 
        <span style="display: contents;">
            <img style="height: 60px;" class="logo" src="/icons/logo-pequena.png">
            <RouterLink class="link" to="/emprestimo">Fazer Emprestimo</RouterLink>
        </span>
        <span>

        </span>
    </header>
</template>
<style scoped>
    header {
        background-color: white;
        color: white;
        text-align: center;
        padding: 10px;
        position: fixed;
        top: 0;
        width: 100%;
        color: black;
        text-decoration: none;
        font-family: 'Inter', sans-serif;
        display: flex;
        justify-content: space-between;
    }
    
</style>