<script setup>



</script>
<template>
    <span class="search">
        <input type="text" placeholder="Pesquise um livro..." />
        <img src="/icons/search.png" />
    </span>
    <section class="list">
        
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
    
}

</style>