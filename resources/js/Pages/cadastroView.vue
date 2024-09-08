<script setup>
import { Link, Head  } from '@inertiajs/vue3'

import { ref } from 'vue'

const tipoUsuario = ref('aluno')

function trigger(opcao) {
    tipoUsuario.value = opcao
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
            <form>
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
                        <input type="text" placeholder="Nome" />
                        <input type="text" placeholder="Email" />
                        <input type="text" placeholder="CPF" />
                        <input v-if="tipoUsuario == 'aluno'" type="text" placeholder="CPF do responsavel" />
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 25px">
                        <input type="password" placeholder="Senha" />
                        <input type="password" placeholder="Confirmar Senha" />
                        <span>Data de Nascimento</span>
                        <div class="nascimento">
                            <input type="number" placeholder="ano" />
                            <input type="number" placeholder="mes" />
                            <input type="number" placeholder="dia" />
                        </div>
                    </div>
                </div>
                <button type="submit">Cadastrar</button>
            </form>
            <span>Já possui conta? <Link :href="route('login')">Fazer Login</Link></span>
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
