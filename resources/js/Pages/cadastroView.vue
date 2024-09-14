<script setup>
import { Link, Head, useForm } from '@inertiajs/vue3'
import { ref, computed } from 'vue'

const tipoUsuario = ref('aluno')

function trigger(opcao) {
    tipoUsuario.value = opcao
}



const form = useForm({
    nome: '',
    email: '',
    cpf: '',
    cpfResp: '',
    senha: '',
    senha_confirmation: '',
    dataNascimento: '',
})

form.dataNascimento = computed(() => {
    return `${form.ano}-${form.mes}-${form.dia}`
})

const submit = () => {
    form.post(route('cadastrar'), {
        onSuccess: () => {
            form.reset()
        },
        onError: () => {
            form.reset('senha')
            form.reset('senha_confirmation')
        },
    })
    console.log(form.dataNascimento)
}

</script>
<template>

    <Head title="Cadastrar" />

    <img class="background" src="/imagens/background.png" />
    <main>
        <section class="logo">
            <span>
                <Link :href="route('home')">Voltar a pagina inicial</Link>
            </span>
            <Link :href="route('home')"><img src="/icons/logo-pequena.png" /></Link>
            <h1>Cadastrar</h1>
        </section>

        <section class="cadastrar">
            <form @submit.prevent="submit">
                <div class="tipo">
                    <div :class="tipoUsuario == 'aluno' ? 'opcao left active' : 'opcao left'" @click="trigger('aluno')">
                        Aluno
                    </div>
                    <div :class="tipoUsuario == 'paiMae' ? 'opcao right active' : 'opcao right'"
                        @click="trigger('paiMae')">
                        Pai/Mãe
                    </div>
                </div>
                <div style="display: flex; gap: 15px">
                    <div style="display: flex; flex-direction: column; gap: 25px">
                        <span class="error-msg" v-if="form.errors.nome">
                            {{ form.errors.nome }}
                        </span>
                        <input type="text" placeholder="Nome" v-model="form.nome" />
                        <span class="error-msg" v-if="form.errors.email">
                            {{ form.errors.email }}
                        </span>
                        <input type="text" placeholder="Email" v-model="form.email" />
                        <span class="error-msg" v-if="form.errors.cpf">
                            {{ form.errors.cpf }}
                        </span>
                        <input type="text" placeholder="CPF" v-model="form.cpf" />
                        <span class="error-msg" v-if="form.errors.cpfResp">
                            {{ form.errors.cpfResp }}
                        </span>
                        <input v-if="tipoUsuario == 'aluno'" type="text" placeholder="CPF do responsavel"
                            v-model="form.cpfResp" />
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 25px">
                        <input type="password" placeholder="Senha" v-model="form.senha" />
                        <input type="password" placeholder="Confirmar Senha" v-model="form.senha_confirmation" />
                        <span class="error-msg" v-if="form.errors.dataNascimento">
                            {{ form.errors.dataNascimento }}
                        </span>
                        <span>Data de Nascimento</span>
                        <div class="nascimento">
                            <input type="number" placeholder="ano" v-model="form.ano" />
                            <input type="number" placeholder="mes" v-model="form.mes" />
                            <input type="number" placeholder="dia" v-model="form.dia" />
                        </div>
                    </div>
                </div>
                <button type="submit">Cadastrar</button>
            </form>
            <span>Já possui conta?
                <Link :href="route('login')">Fazer Login</Link>
            </span>
        </section>
    </main>
</template>
<style scoped>
main {
    z-index: 1;
    height: 100vh;
    position: relative;
    overflow: auto;
}

h1 {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 32px;
    font-weight: 700;
    margin: 20px 0;
}

.logo {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
    padding-top: 10px;
}

.cadastrar {
    text-align: center;
}

form {
    margin: 32px;
    display: flex;
    flex-direction: column;
    gap: 30px;
    align-items: center;
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

button {
    padding: 15px 40px;
    border-radius: 15px;
    border: none;
    background-color: #5e8194;
    color: white;
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 700;
    cursor: pointer;
}

button:hover {
    background-color: #587481;
}

button:active {
    background-color: #4a5f6a;
}

.background {
    position: fixed;
    bottom: 0;
    right: 0;
    object-fit: cover;
    transform: rotate(90deg) translate(-7%, -10%);
    z-index: 0;
    height: 60%;
}

span {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 14px;
    font-weight: 500;
}

span a {
    color: #5e8194;
    text-decoration: none;
}

.tipo {
    display: flex;
    overflow: hidden;
    width: 150px;
}

.opcao {
    flex: 1;
    text-align: center;
    padding: 10px 0;
    cursor: pointer;
    user-select: none;
    font-family: 'Kumbh Sans', sans-serif;
}

.opcao.left {
    border-radius: 20px 0px 0px 20px;
    border: 1px solid #848484;
    border-right: none;
}

.opcao.right {
    border-radius: 0px 20px 20px 0px;
    border: 1px solid #848484;
}

.opcao.active {
    background-color: #c5c5c5;
}

.nascimento {
    display: flex;
    gap: 5px;
}

.nascimento input {
    width: calc((250px - 66px) / 3);
}
</style>
