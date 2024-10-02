<script setup>
import headerComponent from '@/components/adminHeaderComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
import tbComponent from '@/components/tbComponent.vue';
import { Link, Head } from '@inertiajs/vue3';
const titles = ['Status', 'Usuario', 'Data de emprestimo', 'Data de devolução'];

const props = defineProps(['loan'])

const itens = props.loan.map((item) => {
    return [
        item.status,
        item.user.name,
        item.loan_date,
        item.return_date
    ]
})

</script>
<template>
    <Head :title="`(Admin) - Emprestimos`" />
    <headerComponent activeButton="usuarios" />
    <main>
        <Link :href="route('admin.usuarios')">Voltar</Link>
        <div>
        <h2><img src="/icons/user.png"></h2>
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