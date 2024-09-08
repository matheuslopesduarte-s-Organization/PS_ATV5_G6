<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    title: {
        type: String,
        default: 'Itens'
    },
    itens: {
        type: Array,
        default: () => [],
    }
})


</script>
<template>
    <span class="search">
        <input type="text" placeholder="Pesquise um livro..." />
        <img src="/icons/search.png" />
    </span>
    <section class="list">
        <h2>{{ props.title }}</h2>
        <li>
            <ul v-for="item in itens" :key="item.id">
                <Link :href="item.to">
                <div>
                    <h3>{{ item.title }}</h3>
                    <p>{{ item.desc }}</p>
                </div>
                <div v-html="item.component"></div>
            </Link>
            </ul>
        </li>
        <p v-if="itens.length < 1">Nenhum item encontrado</p>
    </section>
</template>
<style scoped>
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
    width: 450px;
}

.search img {
    width: 20px;
    margin-left: -35px;
}

.list {
    box-shadow: 1px 1px 10px 2px #0000001A;
    border-radius: 15px;
    font-family: 'Inter', sans-serif;
    width: 50vw;
    margin-bottom: 50px;
    overflow: hidden;
}

.list h2 {
    padding: 10px 0;
    text-align: center;
    margin: 5px;
}

.list li {
    display: block;
}

ul {
    padding: 0;
    margin: 0;
    border-bottom: 1px solid #0000002b;
    
}

ul a {
    display: flex;
    justify-content: space-between;
    padding: 13px 50px;
    margin: 0;
    cursor: default;
    text-decoration: none;
    color: black;
}

ul a:hover {
    background-color: rgba(0, 0, 0, 0.086);
}

ul:last-child {
    border-bottom: none;
}

.list p {
    text-align: center;
}

li ul div {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

li ul div h3,
li ul div p {
    margin: 0;
}


</style>
