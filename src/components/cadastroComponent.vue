<script setup>
import { RouterLink } from 'vue-router';

import { ref } from 'vue';

const tipoUsuario = ref('aluno');

function trigger(opcao) {
    tipoUsuario.value = opcao;
}

</script>
<template>
    <img class="background" src="/imagens/background.png">
    <main>
        <section class="logo">
            <span>
                <RouterLink to="/">Voltar</RouterLink>
            </span>
            <img src="/icons/logo-pequena.png">
            <h1>Cadastrar</h1>
        </section>

        <section class="cadastrar">
            <form>
                <div class="tipo">
                    <div :class="(tipoUsuario == 'aluno') ? 'opcao left active' : 'opcao left'"
                        @click="trigger('aluno')">Aluno</div>
                    <div :class="(tipoUsuario == 'paiMae') ? 'opcao right active' : 'opcao right'"
                        @click="trigger('paiMae')">Pai/Mãe</div>
                </div>
                <div style="display: flex; gap: 15px">
                    <div style="display: flex; flex-direction: column; gap: 25px">
                        <input type="text" placeholder="Nome">
                        <input type="text" placeholder="Email">
                        <input type="text" placeholder="CPF">
                        <input v-if="tipoUsuario == 'aluno'" type="text" placeholder="CPF do responsavel">
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 25px">
                        <input type="password" placeholder="Senha">
                        <input type="password" placeholder="Confirmar Senha">
                        <span>Data de Nascimento</span>
                        <div class="nascimento">
                            <input type="text" placeholder="ano">
                            <input type="text" placeholder="mes">
                            <input type="text" placeholder="dia">
                        </div>
                    </div>
                </div>
                <button type="submit">Cadastrar</button>
            </form>
            <span>Já possui conta? <RouterLink to="/login">Fazer Login</RouterLink></span>
        </section>
    </main>
</template>
<style scoped>
main {
    z-index: 1;
    height: 100vh;
    position: relative;
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
    border: 2px solid #5E8293B2;
    box-shadow: 0px 0px 5px #5E8293B2;
}

button {
    padding: 15px 40px;
    border-radius: 15px;
    border: none;
    background-color: #5E8194;
    color: white;
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 700;
    cursor: pointer;
}

button:hover {
    background-color: #587481;
}

button:active {
    background-color: #4A5F6A;
}

.background {
    position: fixed;
    bottom: 0;
    right: 0;
    object-fit: cover;
    transform: rotate(90deg) translate(-7%, -10%);
    z-index: 0;
}

span {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 14px;
    font-weight: 500;
}

span a {
    color: #5E8194;
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
    background-color: #C5C5C5;
}

.nascimento{
    display: flex;
    gap: 5px;
}
.nascimento input{
    width: calc((250px - 66px) / 3)
}
</style>