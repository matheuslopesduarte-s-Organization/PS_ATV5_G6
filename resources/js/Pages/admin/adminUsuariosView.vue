<script setup>
import headerComponent from '@/components/adminHeaderComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
import listComponent from '@/components/listComponent.vue'
import { Head } from '@inertiajs/vue3';
const items = [
    {
        title: 'João',
        desc: 'sei la',
        to: '/admin/usuario/1',
        component: '<img style="height: 50px; width: 50px; object-fit: cover; border-radius: 50%;" src="/imagens/livros.png">'
    },
    {
        title: 'Maria',
        desc: 'sei la',
        to: '/admin/usuario/2',
        component: '<img style="height: 50px; width: 50px; object-fit: cover; border-radius: 50%;" src="/imagens/livros.png">'
    }
]

</script>
<template>
    <Head title="(Admin) - Usuários" />
    <headerComponent activeButton="usuarios" />
    <main>
        <listComponent :itens="items" :title="'Usuários'" />
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
</style>