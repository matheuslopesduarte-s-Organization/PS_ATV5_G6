<script setup>
import headerComponent from './headerComponent.vue';
import footerComponent from './footerComponent.vue';
import { RouterLink } from 'vue-router';

</script>
<template>
    <headerComponent activeButton="seus_livros" />
    <main>
        <section class="title">
            <h1>Seus Livros</h1>
        </section>
        <section class="livros">
            <div class="genero">
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