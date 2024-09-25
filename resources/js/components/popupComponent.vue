<script setup>
import { ref, onMounted, watch } from 'vue';
import { usePage } from '@inertiajs/vue3';

const visivel = ref(false);
const texto = ref('');
const { props } = usePage();

const trigger = () => {
  if (props.success) {
    texto.value = props.success;
    visivel.value = true;

    setTimeout(() => {
      visivel.value = false;
    }, 3000);
  }
};


watch(
  () => props.success,
  (newMessage) => {
    if (newMessage) {
      trigger();
    }
  },
  { immediate: true } 
);

onMounted(trigger);

const limp = () => {
  texto.value = '';
};
</script>
<template>
  <transition name="notificacao" @after-leave="limp" >
    <div v-if="visivel" class="notificacao-div">
      <p>{{ texto }}</p>
    </div>
  </transition>
</template>
<style scoped>
.notificacao-div {
  position: absolute;
  top: 20px;
  left: 50%;
  transform: translateX(-50%);
  background-color: #89b7cc;
  color: black;
  padding: 15px 30px;
  border-radius: 20px;
  z-index: 100;
  box-shadow: 0 0 16px rgba(0, 0, 0, 0.4);
  font-family: 'Inter', sans-serif;
}

.notificacao-enter-active,
.notificacao-leave-active {
  transition: opacity 0.5s ease, transform 0.5s ease;
}

.notificacao-enter-from,
.notificacao-leave-to {
  transform: translateX(20px);
  opacity: 0;
}
.notificacao-leave-from {
  transform: translateX(20px);
  opacity: 1;
}
</style>