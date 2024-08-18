<script setup>
import headerComponent from './headerComponent.vue';
import footerComponent from './footerComponent.vue';
import carroselComponent from './carroselComponent.vue';

const itens = [
    {
        id: 1,
        titulo: 'Livro 1',
        capa: '/imagens/livro-capa.png',
        to: '/acervo/detalhes/1'
    },
    {
        id: 2,
        titulo: 'Livro 2',
        capa: '/imagens/livro-capa.png',
        to: '/acervo/detalhes/2'
    },
    {
        id: 3,
        titulo: 'Livro 3',
        capa: '/imagens/livro-capa.png',
        to: '/acervo/detalhes/3'
    },
    {
        id: 4,
        titulo: 'Livro 4',
        capa: '/imagens/livro-capa.png',
        to: '/acervo/detalhes/4'
    },
    {
        id: 5,
        titulo: 'Livro 5',
        capa: '/imagens/livro-capa.png',
        to: '/acervo/detalhes/5'
    },
    {
        id: 6,
        titulo: 'Livro 6',
        capa: '/imagens/livro-capa.png',
        to: '/acervo/detalhes/6'
    },
    {
        id: 7,
        titulo: 'Livro 7',
        capa: '/imagens/livro-capa.png',
        to: '/acervo/detalhes/7'
    },
    {
        id: 8,
        titulo: 'Livro 8',
        capa: '/imagens/livro-capa.png',
        to: '/acervo/detalhes/8'
    },
    {
        id: 9,
        titulo: 'Livro 9',
        capa: '/imagens/livro-capa.png',
        to: '/acervo/detalhes/9'
    }
]
</script>
<template>
    <headerComponent activeButton="emprestimo" />
    <main>
        <carroselComponent v-for="a in itens" :key="a" :items="itens" title="Seus Livros" />
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