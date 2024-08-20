<script setup>
import { ref, computed } from 'vue'

const props = defineProps({
  title: String,
  items: Array
})

const items = ref(props.items)
const pagiAtual = ref(0)
const porPagi = 3

const paginas = computed(() => {
  return Math.ceil(items.value.length / porPagi)
})

const trackStyle = computed(() => {
  return {
    transform: `translateX(-${pagiAtual.value * (106 / porPagi)}%)`
  }
})

function voltPagi() {
  if (pagiAtual.value > 0) {
    pagiAtual.value--
    pagiAtual.value--
    pagiAtual.value--
  }
}

function proxPagi() {
  if (pagiAtual.value < items.value.length - porPagi) {
    pagiAtual.value++
    pagiAtual.value++
    pagiAtual.value++
  }
}

function pPagi(index) {
  pagiAtual.value = index * porPagi
}
</script>

<template>
  <section class="title">
    <h1>{{ props.title }}</h1>
  </section>
  <section class="livros">
    <button :class="pagiAtual <= 0 ? 'button-left hide' : 'button-left'" @click="voltPagi">
      <img src="/icons/seta.png" />
    </button>
    <div class="itens">
      <div class="carousel-track" :style="trackStyle">
        <RouterLink v-for="(item, index) in items" :to="item.to" :key="index" class="livro">
          <img :src="item.capa" />
        </RouterLink>
      </div>
    </div>
    <button :class="pagiAtual >= items.length - porPagi ? 'button-right hide' : 'button-right'" @click="proxPagi">
      <img src="/icons/seta.png" />
    </button>
  </section>
  <section class="nav">
    <span v-for="pagina in paginas" :key="pagina"
      :class="Math.floor(pagiAtual / porPagi) === pagina - 1 ? 'paginas active' : 'paginas'" @click="pPagi(pagina - 1)">
      {{ pagina }}</span>
  </section>
</template>

<style scoped>
.livros {
  display: flex;
  align-items: center;
  margin: 15px;
  margin-bottom: 0;
  justify-content: center;
}

.itens {
  overflow: hidden;
  width: 720px;
}

.carousel-track {
  display: flex;
  transition: transform 0.3s ease-in-out;
  align-items: center;
  gap: 40px;
  margin: 20px;
}

.livro {
  width: 200px;
  height: 282px;
  object-fit: cover;
  user-select: none;
}

.livro img {
  width: 200px;
  height: 282px;
}

.livro:hover {
  transform: scale(1.1);
  cursor: pointer;
}

.button-right,
.button-left {
  background: none;
  border: none;
  width: 40px;
  height: 40px;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  user-select: none;
}

.button-right img,
.button-left img {
  width: 40px;
  height: 40px;
}

.button-right {
  margin-left: 15px;
}

.button-left {
  transform: rotate(180deg);
  margin-right: 15px;
}

.button-left.hide,
.button-right.hide {
  visibility: hidden;
}

.title {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  width: calc(100% - 25% - 40px);
  padding: 20px;
  margin-left: 25%;
}

.title h1 {
  font-size: 28px;
  font-weight: 700;
  font-family: 'Kumbh Sans', sans-serif;
}

.nav {
  display: flex;
  justify-content: center;
  margin-bottom: 35px;
}

.paginas {
  font-family: sans-serif;
  width: 21px;
  height: 21px;
  display: flex;
  margin: 0 5px;
  background-color: #ccc;
  border-radius: 50%;
  cursor: pointer;
  justify-content: center;
  align-items: center;
  user-select: none;
  transition: background-color 0.3s;
}

.paginas.active {
  background-color: #333;
  color: #fff;
}
</style>
