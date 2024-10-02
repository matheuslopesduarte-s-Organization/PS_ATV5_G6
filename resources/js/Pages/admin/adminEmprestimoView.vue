<script setup>
import headerComponent from '@/components/adminHeaderComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
import tbComponent from '@/components/tbComponent.vue';
import { Link, Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
const titles = ['Status', 'Usuario', 'Data de emprestimo', 'Data do prazo', 'Data de devolução'];

const props = defineProps(['loan'])

const item = ref([[
    props.loan.data.status,
    props.loan.data.user.name,
    (props.loan.data.loan_date) ? props.loan.data.loan_date : 'N/A',
    (props.loan.data.return_deadline) ? props.loan.data.return_deadline : 'N/A',
    (props.loan.data.return_date) ? props.loan.data.return_date : 'N/A'
]])
const form = useForm({
    status: props.loan.data.status,
});

function confirmEmp() {
    form.post(route('admin.emprestimo.confirm', { id: props.loan.data.id }), {
        onSuccess: () => {
            console.log('success')
        },
        onError: (errors) => {
            alert(errors.error)
        },
        preserveState: true,
    });
}

function returnEmp() {
    form.post(route('admin.emprestimo.return', { id: props.loan.data.id }), {
        onSuccess: () => {
            console.log('success')
        },
        onError: (errors) => {
            alert(errors.error)
        },
        preserveState: true,
    });
}
</script>
<template>

    <Head :title="`(Admin) - Emprestimos`" />
    <headerComponent activeButton="usuarios" />
    <main>
        <Link :href="route('admin.usuarios')">Voltar</Link>
        <div>
            <h2><img src="/icons/user.png"></h2>
            <tbComponent :titles="titles" :itens="item" :title="'aaaaaaaaaa'" />
        </div>
        <button class="g-btn" v-if="props.loan.data.status == 'ready'" @click="confirmEmp">Confirmar emprestimo</button>
        <button class="gr-btn" v-if="props.loan.data.status != 'returned' && props.loan.data.status != 'ready'"
            @click="returnEmp">Devolvido</button>
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

.g-btn {
    background-color: #5E8A4F;
    color: white;
    padding: 10px 20px;
    border-radius: 25px;
    cursor: pointer;
    margin: 20px;
    border: none;
}

.gr-btn {
    background-color: #8A5E5E;
    color: white;
    padding: 10px 20px;
    border-radius: 25px;
    cursor: pointer;
    margin: 20px;
    border: none;
}
</style>