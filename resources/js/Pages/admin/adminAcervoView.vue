<script setup>
import headerComponent from '@/components/adminHeaderComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
import listComponent from '@/components/listComponent.vue'
import { Head } from '@inertiajs/vue3';
const items = [
    {
        title: 'Livro1',
        to: '/admin/acervo/livro/1',
        component: '<div @click style="display:flex;gap:15px"><a href="/admin/acervo/editar/1"><img class="list-component-subcomp" style="height: 25px; width: 25px; object-fit: cover;" src="/icons/edit.png"></a><a href="/admin/acervo/editar/1?delete"><img class="list-component-subcomp" style="height: 25px; width: 25px; object-fit: cover;" src="/icons/delete.png"></a></div>'
    },
    {
        title: 'Livro2',
        to: '/admin/acervo/livro/2',
        component: '<div style="display:flex;gap:15px"><img class="list-component-subcomp" style="height: 25px; width: 25x; object-fit: cover;" src="/icons/edit.png"><img class="list-component-subcomp" style="height: 25px; width: 25x; object-fit: cover;" src="/icons/delete.png"></div>'
    }
]

</script>
<template>
    <Head title="(Admin) - Acervo" />
    <headerComponent activeButton="acervo" />
    <main>
        <listComponent :itens="items" :title="'Livros'" />
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
<style>
    .list-component-subcomp:hover {
        cursor: pointer;
        background-color: rgba(0, 0, 0, 0.080);
        border-radius: 5px;
    }
</style>