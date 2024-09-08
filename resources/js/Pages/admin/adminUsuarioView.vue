<script setup>
import headerComponent from '@/components/adminHeaderComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
import tbComponent from '@/components/tbComponent.vue';
import { Link } from '@inertiajs/vue3';
const titles = ['Livro', 'Empréstimo', 'devolução', 'Penalizações'];
const itens = [
    [
        'Livro 1',
        '01/01/2021',
        '01/02/2021',
        'R$ 10,00'
    ]
]

</script>
<template>
    <headerComponent activeButton="usuarios" />
    <main>
        <Link :href="route('admin.usuarios')">Voltar</Link>
        <div>
        <h2>User 1<img src="/icons/user.png"></h2>
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