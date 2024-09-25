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