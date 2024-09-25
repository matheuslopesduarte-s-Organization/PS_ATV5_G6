<script setup>
import headerComponent from '@/components/adminHeaderComponent.vue';
import footerComponent from '@/components/footerComponent.vue';
import listComponent from '@/components/listComponent.vue';
import { Link, Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    books: Object,
});

const deleteBook = (isbn) => {
    if (confirm('Você tem certeza que deseja excluir este livro?')) {
        useForm().delete(`/admin/acervo/${isbn}`);
    }
};


</script>

<template>
    <Head title="(Admin) - Acervo" />
    <headerComponent activeButton="acervo" />
    <main>
        <listComponent :itens="books.data" :title="'Livros'">
            <template #default="{ item }">
                <div style="display:flex;gap:15px">
                    <Link :href="`/admin/acervo/${item.isbn}/edit`">
                        <img class="list-component-subcomp" style="height: 25px; width: 25px; object-fit: cover;" src="/icons/edit.png" />
                    </Link>
                    <button @click="deleteBook(item.isbn)" style="border: none; background: none; padding: 0;">
                        <img class="list-component-subcomp" style="height: 25px; width: 25px; object-fit: cover;" src="/icons/delete.png" />
                    </button>
                </div>
            </template>
        </listComponent>

        <div v-if="books.meta.total > 0">
            <p>Mostrando {{ books.meta.from }} a {{ books.meta.to }} de {{ books.meta.total }} livros</p>
          
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
</style>
