<script setup>
import headerComponent from '@/components/adminHeaderComponent.vue';
import footerComponent from '@/components/footerComponent.vue';
import listComponent from '@/components/listComponent.vue';
import { Link, Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    books: Object,
});


</script>

<template>

    <Head title="(Admin) - Acervo" />
    <headerComponent activeButton="acervo" />
    <main>
        <listComponent :itens="books.data" :title="'Livros'">
            <template #default="{ item }">
                <div style="display:flex;gap:15px">
                    <Link :href="`/admin/acervo/${item.isbn}/edit`">
                    <img class="list-component-subcomp" style="height: 25px; width: 25px; object-fit: cover;"
                        src="/icons/edit.png" />
                    </Link>
                    <Link :href="`/admin/acervo/${item.isbn}/edit?delete`">
                    <img class="list-component-subcomp" style="height: 25px; width: 25px; object-fit: cover;"
                        src="/icons/delete.png" />
                    </Link>
                </div>
            </template>
        </listComponent>

        <div class="pagination-div" v-if="books.meta.total > 0">

            <p>{{ books.meta.from }} - {{ books.meta.to }} / {{ books.meta.total }}</p>
            <div class="pagination">
                <Link v-for="(valor, nome) in books.links" :style="typeof valor != 'string' ? 'display: none' : null" :key="nome" :href="valor" class="pagination-link"
                    :class="{ 'pagination-link-active': page }">
                {{ nome }}
                </Link>
            </div>
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
