<script setup>
import headerComponent from '@/components/adminHeaderComponent.vue';
import footerComponent from '@/components/footerComponent.vue';
import listComponent from '@/components/listComponent.vue';
import { Link, Head, useForm } from '@inertiajs/vue3';

const props = defineProps(['loans']);

const items = props.loans.data.map(loan => {
    return {
        'title': loan.book.title,
        'desc': loan.user.name,
        'to': route('admin.emprestimo', { id: loan.id })
    }
})

</script>

<template>

    <Head title="(Admin) - Emprestimos" />
    <headerComponent activeButton="emprestimos" />
    <main>
        <listComponent :itens="items" :title="'Livros Emprestados'" />
        
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
.list-component-subcomp {
    z-index: 12;
    position: relative;
}

.list-component-subcomp:hover {
    cursor: pointer;
    background-color: rgba(0, 0, 0, 0.080);
    border-radius: 5px;
}

.pagination-div {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.pagination {
    display: flex;
    gap: 10px;
}

.pagination a {
    padding: 5px 10px;
    border-radius: 5px;
    background-color: #5e8194;
    color: white;
    text-decoration: none;
}

.pagination a:hover {
    background-color: #587481;
}

.pagination a:active {
    background-color: #4e6a7a;
}
</style>
