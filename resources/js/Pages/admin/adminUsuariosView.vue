<script setup>
import headerComponent from '@/components/adminHeaderComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
import listComponent from '@/components/listComponent.vue'
import { Head } from '@inertiajs/vue3';

const props = defineProps(['users']);

const items = props.users.data.map(user => {
    return {
        'title': user.name,
        'desc': user.email,
        'to': route('admin.usuario', { id: user.cpf })
    }
})

</script>
<template>

    <Head title="(Admin) - Usuários" />
    <headerComponent activeButton="usuarios" />
    <main>
        <listComponent :itens="items" :title="'Usuários'">
            <img style="height: 50px; width: 50px; object-fit: cover; border-radius: 50%;" src="/icons/user.png">
        </listComponent>

        <div class="pagination-div" v-if="users.meta.total > 0">

            <p>{{ users.meta.from }} - {{ users.meta.to }} / {{ users.meta.total }}</p>
            <div class="pagination">
                <Link v-for="(valor, nome) in users.links" :style="typeof valor != 'string' ? 'display: none' : null"
                    :key="nome" :href="valor" class="pagination-link" :class="{ 'pagination-link-active': page }">
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