<script setup>
import { Head } from '@inertiajs/vue3';

import headerComponent from '@/components/headerComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
import carroselComponent from '@/components/carroselComponent.vue'
import { def } from '@vue/shared';

const title = 'Seus Livros'

const props = defineProps(['loans'])

const msg = 'N/A';


const itens = props.loans.map(loan => {
  let msg;

  switch (loan.status) {
    case 'returned':
      msg = 'Devolvido'
      break
    case 'active':
      msg = 'Emprestado'
      break
    case 'overdue':
      msg = 'Atrasado'
      break
    case 'ready':
      msg = 'Disponível'
      break
    default:
      msg = 'N/A'
      break
  }
  return {
    capa: loan.book.data.cover,
    nome: loan.book.data.title,
    status: msg,
    dataentrega: (loan.return_deadline)? loan.return_deadline : 'N/A',
  }
})
</script>
<template>
  <Head title="Seus livros" />

  <headerComponent activeButton="seus_livros" />

  <main>
    <carroselComponent :title="title" :items="itens">
      <template #default="{ item }">
        <p class="text" >Status: {{ item.status }}</p>
        <p class="text" >Data de entrega:{{ item.dataentrega }}</p>
      </template>
    </carroselComponent>
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

.text{
  text-decoration: none;
  color: black;
  font-family: 'Inter', sans-serif;
  margin: 0;

}
</style>
