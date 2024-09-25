<script setup>
import headerComponent from '@/components/adminHeaderComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
import tbComponent from '@/components/tbComponent.vue';
import { Link, Head } from '@inertiajs/vue3';
const titles = ['Livro', 'Empréstimo', 'devolução', 'Penalizações'];
const itens = [
    
]

const props = defineProps(['user']);

</script>
<template>
    <Head :title="`(Admin) - ${user.name}`" />
    <headerComponent activeButton="usuarios" />
    <main>
        <Link :href="route('admin.usuarios')">Voltar</Link>
        <div>
        <h2>{{ user.name }}<img src="/icons/user.png"></h2>
        <tbComponent :titles="titles" :itens="itens" :title="'aaaaaaaaaa'" />
    </div>
    </main>
    <footerComponent />
</template>
<style scoped>
main {
    display: flex;
    padding-top: 84px;
    flex-direction: column;
    align-items: center;
}

h2 {
    font-family: 'Inter', sans-serif;
    text-align: left;
    position: relative;
    right: 30px;
    display: flex;
    align-items: center;
    font-size: 16px;
    margin: 16px 0 0 0;
}
h2 img {
    width: 30px;
    height: 30px;
    margin-left: 10px;
}

a {
    font-family: 'Inter', sans-serif;
    text-align: center;
    margin-top: 20px;
}
</style>