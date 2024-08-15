<script setup>
import headerComponent from './headerComponent.vue';
import footerComponent from './footerComponent.vue';
import { RouterLink } from 'vue-router';

const aa = [,,,,,,,,]
</script>
<template>
    <headerComponent activeButton="emprestimo" />
    <main>
        <section class="title">
            <h1>Acervo</h1>
        </section>
        <section class="livros">
            <span class="search">
                <input type="text" placeholder="Pesquise um livro...">
                <img src="/icons/search.png">
            </span>
            <div v-for="a in aa" class="genero">
                <div>
                    <h2>genero</h2>
                </div>
                <div class="itens">
                    <RouterLink to="/acervo/detalhes/1" class="item">
                        <img src="/imagens/livro-capa.png">
                    </RouterLink>
                    <RouterLink to="/acervo/detalhes/2" class="item">
                        <img src="/imagens/livro-capa.png">
                    </RouterLink>
                    <RouterLink to="/acervo/detalhes/3" class="item">
                        <img src="/imagens/livro-capa.png">
                    </RouterLink>
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
    justify-content: center;
    align-items: center;
    width: calc(100% - 40px);
    padding: 20px;
    background-color: #89B7CC;
}

.title h1 {
    font-size: 32px;
    font-weight: 700;
    font-family: 'Kumbh Sans', sans-serif;
}

.search {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 20px;
}

.search input {
    padding: 10px 15px;
    border: 1px solid #848484;
    border-radius: 15px;
    width: 300px;
}

.search img {
    width: 20px;
    margin-left: -35px;
}

.genero {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 45px;
}
.itens {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 40px;
    margin: 20px;
}
.item {
    width: 200px;
    height: 282px;
    object-fit: cover;
}
.item img {
    width: 200px;
    height: 282px;
}
.item:hover {
    transform: scale(1.1);
    cursor: pointer;
}
.genero h2 {
    font-size: 24px;
    font-weight: 700;
    font-family: 'Kumbh Sans', sans-serif;
    margin: 10px;
}
</style>