<script setup>
import headerComponent from '@/components/headerComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
import { Link, Head } from '@inertiajs/vue3'

const props = defineProps(['book'])

</script>
<template>
    <Head :title="book.data.title" />

    <headerComponent activeButton="emprestimo" />
    <main>
        <span>
            <Link :href="route('acervo')">Voltar ao acervo</Link>
        </span>
        <section class="title">
            <h1>{{ book.data.title }}</h1>
        </section>
        <section class="livro">
            <img :src="book.data.cover" />
            <div class="livro-info">
                <h2>Autor: {{ book.data.author }}</h2>
                <h2>Gênero: {{  book.data.genre.name }}</h2>
                <h2>Classificação: {{ book.data.classification }}</h2>
                <h2>
                    Sinopse: {{ book.data.synopsis }}
                </h2>
                <div class="btn-emprestimo">
                    <Link :href="`/emprestimos/criar/${book.data.isbn}`" class="btn">Emprestar</Link>
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
    background-color: #89b7cc;
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
    background-color: #5e8194;
}

.btn-emprestimo {
    display: flex;
    margin-left: 40px;
    margin-top: 80px;
}

span {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 14px;
    font-weight: 500;
    text-align: center;
}

span a {
    color: #5e8194;
    text-decoration: none;
}

img {
    width: 300px;
    height: 450px;
    object-fit: cover;
    cursor: pointer;
    border: 1px solid #707070;
}
</style>
