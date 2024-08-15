<script setup>
import headerComponent from './headerComponent.vue';
import footerComponent from './footerComponent.vue';
import { RouterLink } from 'vue-router';

</script>
<template>
    <headerComponent activeButton="emprestimo" />
    <main>
        <section class="title">
            <h1>Sede - Amélie Nothomb</h1>
        </section>
        <section class="livro">
            <img src="/imagens/livro-capa.png">
            <div class="livro-info">
                <h2>Autor: Amélie Nothomb</h2>
                <h2>Gênero: X</h2>
                <h2>Classificação: Juvenil</h2>
                <h2>Sinopse: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ultricies, erat in sodales
                    euismod, ex dui mattis arcu, non sagittis felis elit vitae ipsum. Nam rhoncus sagittis augue.</h2>
                <div class="btn-emprestimo">
                    <button class="btn">
                        Emprestar
                    </button>
                </div>
            </div>
        </section>
    </main>
    <footerComponent />
</template>
<style scoped>
main {
    display: flex;
    padding-top: 84px;
    flex-direction: column;
}

.title {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    width: calc(100% - 15% - 40px);
    padding: 20px;
    margin-left: 15%;
}

.title h1 {
    font-size: 28px;
    font-weight: 700;
    font-family: 'Kumbh Sans', sans-serif;
}

.livro {
    margin: 25px 15% 50px 15%;
    display: flex;
    gap: 25px;
}

.livro-info {
    margin-top: 20px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 12px;
    font-weight: 500;
}

.btn {
    font-family: 'Kumbh Sans', sans-serif;
    padding: 20px 25px;
    background-color: #89B7CC;
    border-radius: 20px;
    color: black;
    font-weight: 600;
    font-size: 15px;
    text-decoration: none;
    border: none;   
}
.btn:hover {
    transform: scale(1.1);
    cursor: pointer;
}
.btn:active {
    background-color: #5E8194;
}

.btn-emprestimo {
    display: flex;
    margin-left: 40px;
    margin-top: 80px;
}
</style>