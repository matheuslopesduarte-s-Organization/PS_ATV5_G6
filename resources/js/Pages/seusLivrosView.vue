<script setup>
import { Head } from '@inertiajs/vue3';

import headerComponent from '@/components/headerComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
import carroselComponent from '@/components/carroselComponent.vue'

const title = 'Seus Livros'

const itens = [
  {
    id: 1,
    titulo: 'Livro 1',
    capa: '/imagens/livro-capa.png',
    to: '/acervo/livro/1'
  },
  {
    id: 2,
    titulo: 'Livro 2',
    capa: '/imagens/livro-capa.png',
    to: '/acervo/livro/2'
  },
  {
    id: 3,
    titulo: 'Livro 3',
    capa: '/imagens/livro-capa.png',
    to: '/acervo/livro/3'
  },
  {
    id: 4,
    titulo: 'Livro 4',
    capa: '/imagens/livro-capa.png',
    to: '/acervo/livro/4'
  },
  {
    id: 5,
    titulo: 'Livro 5',
    capa: '/imagens/livro-capa.png',
    to: '/acervo/livro/5'
  },
  {
    id: 6,
    titulo: 'Livro 6',
    capa: '/imagens/livro-capa.png',
    to: '/acervo/livro/6'
  },
  {
    id: 7,
    titulo: 'Livro 7',
    capa: '/imagens/livro-capa.png',
    to: '/acervo/livro/7'
  },
  {
    id: 8,
    titulo: 'Livro 8',
    capa: '/imagens/livro-capa.png',
    to: '/acervo/livro/8'
  },
  {
    id: 9,
    titulo: 'Livro 9',
    capa: '/imagens/livro-capa.png',
    to: '/acervo/livro/9'
  }
]
</script>
<template>
  <Head title="Seus livros" />

  <headerComponent activeButton="seus_livros" />

  <main>
    <carroselComponent :title="title" :items="itens" />
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
