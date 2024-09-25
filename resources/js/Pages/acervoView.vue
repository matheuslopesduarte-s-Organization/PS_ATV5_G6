<script setup>
import headerComponent from '@/components/headerComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
import carroselComponent from '@/components/carroselComponent.vue'
import { Head } from '@inertiajs/vue3';
const generos = [
    {
        nome: 'Ação',
        itens: [
            {
                to: 'acervo/livro/1',
                capa: '/imagens/livro-capa.png'
            },
            {
                to: 'acervo/livro/2',
                capa: '/imagens/livro-capa.png'
            },
            {
                to: 'acervo/livro/3',
                capa: '/imagens/livro-capa.png'
            },
            {
                to: 'acervo/livro/4',
                capa: '/imagens/livro-capa.png'
            },
            {
                to: 'acervo/livro/5',
                capa: '/imagens/livro-capa.png'
            },
            {
                to: 'acervo/livro/6',
                capa: '/imagens/livro-capa.png'
            }
        ]
    },
    {
        nome: 'Aventura',
        itens: [
            {
                to: 'acervo/livro/7',
                capa: '/imagens/livro-capa.png'
            },
            {
                to: 'acervo/livro/8',
                capa: '/imagens/livro-capa.png'
            },
            {
                to: 'acervo/livro/9',
                capa: '/imagens/livro-capa.png'
            },
            {
                to: 'acervo/livro/10',
                capa: '/imagens/livro-capa.png'
            },
            {
                to: 'acervo/livro/11',
                capa: '/imagens/livro-capa.png'
            },
            {
                to: 'acervo/livro/12',
                capa: '/imagens/livro-capa.png'
            }
        ]
    },
    {
        nome: 'Romance',
        itens: [
            {
                to: 'acervo/livro/13',
                capa: '/imagens/livro-capa.png'
            },
            {
                to: 'acervo/livro/14',
                capa: '/imagens/livro-capa.png'
            },
            {
                to: 'acervo/livro/15',
                capa: '/imagens/livro-capa.png'
            },
            {
                to: 'acervo/livro/16',
                capa: '/imagens/livro-capa.png'
            },
            {
                to: 'acervo/livro/17',
                capa: '/imagens/livro-capa.png'
            },
            {
                to: 'acervo/livro/18',
                capa: '/imagens/livro-capa.png'
            }
        ]
    }
]
</script>
<template>
    <Head title="Acervo" />
    <headerComponent activeButton="emprestimo" />
    <main>
        <section class="title">
            <h1>Acervo</h1>
        </section>
        <section class="livros">
            <span class="search">
                <input type="text" placeholder="Pesquise um livro..." />
                <img src="/icons/search.png" />
            </span>
            <carroselComponent v-for="a in generos" :key="a" :items="a.itens" :title="a.nome" />
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
    background-color: #89b7cc;
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
</style>
