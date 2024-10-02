<script setup>
import headerComponent from '@/components/headerComponent.vue';
import footerComponent from '@/components/footerComponent.vue';
import carroselComponent from '@/components/carroselComponent.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps(['genres']);
</script>

<template>

    <Head title="Acervo" />
    <headerComponent activeButton="emprestimo" />
    <main>
        <section class="title">
            <h1>Acervo</h1>
        </section>
        <section :class="(genres.length < 1)? 'no-items' : 'livros'">
            <span class="search">
                <input type="text" placeholder="Pesquise um livro..." />
                <img src="/icons/search.png" />
            </span>

            <carroselComponent v-for="genre in genres" :key="genre.id"
                :items="genre.books.data.map(book => ({ to: `/acervo/livro/${book.isbn}`, capa: book.cover }))"
                :title="genre.name" />
            <h2 v-if="genres.length < 1">Nenhum livro encontrado</h2>
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

.no-items {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-family: 'Inter', sans-serif;
}
</style>
