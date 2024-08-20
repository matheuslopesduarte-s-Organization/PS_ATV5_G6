<script setup>
import { RouterLink } from 'vue-router'
import footerComponent from '@components/footerComponent.vue'
import headerComponent from '@components/headerComponent.vue'
</script>
<template>
    <headerComponent :isTransparent="true" />
    <main>
        <section class="content">
            <h1>Fazer Empréstimo agora</h1>
            <RouterLink class="link" to="/acervo">Ver livros</RouterLink>
        </section>
        <section class="deco">
            <img src="/imagens/livros.png" />
        </section>
    </main>
    <footerComponent />
</template>
<style scoped>
main {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.content {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.deco {
    display: flex;
}

h1 {
    font-size: 32px;
    font-family: 'Kumbh Sans', sans-serif;
    margin: 0 0 20px 0;
}

.deco img {
    height: calc(100vh - 153px);
}

.link {
    font-family: 'Kumbh Sans', sans-serif;
    padding: 20px 25px;
    background-color: #89b7cc;
    border-radius: 20px;
    color: black;
    font-weight: 700;
    font-size: 20px;
    text-decoration: none;
}

.link:hover {
    transform: scale(1.1);
}

.link:active {
    background-color: #5e8194;
}
</style>
