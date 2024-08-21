<script setup>


const varA = '<img style="height: 50px; width: 50px; object-fit: cover; border-radius: 50%;" src="/imagens/livros.png">';

</script>
<template>
    <span class="search">
        <input type="text" placeholder="Pesquise um livro..." />
        <img src="/icons/search.png" />
    </span>
    <section class="list">
        <h2>Usuários</h2>
        <li>
            <ul>
                <div>
                    <h3>Item</h3>
                    <p>Desc</p>
                </div>
                <div v-html="varA"></div>
            </ul>
            <ul></ul>
            <ul></ul>
        </li>
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
    box-shadow: 1px 1px 10px 1px #0000001A;
    border-radius: 15px;
    font-family: 'Inter', sans-serif;
}


.list h2 {
    padding: 10px 150px;
}

</style>