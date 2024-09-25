<script setup>
import headerComponent from '@/components/headerComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
import { Link, Head } from '@inertiajs/vue3'
import {useForm} from '@inertiajs/vue3';
import { ref } from 'vue'

const props = defineProps(['book'])

const isAlert = ref(false)

const form = useForm({
    mes: '',
    dia: ''
})

function showAlert() {
    isAlert.value = true
}

function submit() {
    form.post(route('loans.store', { id: props.book.data.isbn }), {
        onSuccess: () => {
            showAlert()
        },
        onError: (errors) => {
           
        },
        preserveState: true,
    });
};


</script>
<template>

    <Head :title="book.data.title" />

    <headerComponent activeButton="emprestimo" />
    <main v-if="!isAlert">
        <span>
            <Link :href="route('acervo')">Voltar ao acervo</Link>
        </span>

        <section class="livro">
            <img :src="book.data.cover" />
            <div class="livro-info">
                <h1>{{ book.data.title }}</h1>
            </div>
        </section>
        <section class="livro form">
            
            <form @submit.prevent="submit">
                <h2>Deseja mesmo emprestar este livro?</h2>
                <label for="data_emprestimo">Data de inicio:</label>
                <div class="nascimento">
                    <input type="number" placeholder="mes" v-model="form.mes" />
                    <input type="number" placeholder="dia" v-model="form.dia" />
                </div>
                <button type="submit" class="btn">Emprestar</button>
            </form>
        </section>
    </main>
    <div class="alerta" v-if="isAlert">
        <h1>Parabéns,
            Você emprestou o livro “X”.</h1>
            <p>Você tem até o dia {{ form.dia }}/{{ form.mes }} para devolve-lô.</p>
        </div>
    <footerComponent />
</template>
<style scoped>
main {
    display: flex;
    padding-top: 84px;
    flex-direction: column;
}

.title {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    width: calc(100% - 15% - 40px);
    padding: 20px;
    margin-left: 15%;
}

.title h1 {
    font-size: 28px;
    font-weight: 700;
    font-family: 'Kumbh Sans', sans-serif;
}

.livro {
    margin: 25px 15% 50px 15%;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}

.livro-info {
    margin-top: 20px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 12px;
    font-weight: 500;
}

.btn {
    font-family: 'Kumbh Sans', sans-serif;
    padding: 20px 25px;
    background-color: #89b7cc;
    border-radius: 20px;
    color: black;
    font-weight: 600;
    font-size: 15px;
    text-decoration: none;
    border: none;
}

.btn:hover {
    transform: scale(1.1);
    cursor: pointer;
}

.btn:active {
    background-color: #5e8194;
}

input {
    padding: 12px;
    border-radius: 12px;
    border: 2px solid #848484b1;

    width: 250px;
}

input:focus {
    outline: none;
    border: 2px solid #5e8293b2;
    box-shadow: 0px 0px 5px #5e8293b2;
}

.btn-emprestimo {
    display: flex;
    margin-left: 40px;
    margin-top: 80px;
}

span {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 14px;
    font-weight: 500;
    text-align: center;
}

span a {
    color: #5e8194;
    text-decoration: none;
}

img {
    width: 300px;
    height: 450px;
    object-fit: cover;
    cursor: pointer;
    border: 1px solid #707070;
}

form {
    font-family: 'Inter', sans-serif;
    align-items: center;
    text-align: center;
    gap: 12px;
    display: flex;
    flex-direction: column;
}

.alerta {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding-top: 100px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 20px;
    font-weight: 700;
}
</style>
