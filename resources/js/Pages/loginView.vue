<script setup>
import { Link, Head } from '@inertiajs/vue3'

</script>
<template>
    <Head title="Fazer Login" />

    <img class="background" src="/imagens/background.png" />
    <main>
        <section class="logo">
            <span>
                <Link :href="route('home')">Voltar a pagina inicial</Link>
            </span>
            <Link :href="route('home')"><img src="/icons/logo-pequena.png" /></Link>
            <h1>Fazer Login</h1>
        </section>

        <section class="login">
            <form>
                <input type="text" placeholder="Email" />
                <input type="password" placeholder="Senha" />
                <button>Login</button>
            </form>
            <span>Não possui conta? <Link :href="route('cadastrar')">Cadastrar</Link></span>
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

.login {
    text-align: center;
}

form {
    margin: 32px;
    display: flex;
    flex-direction: column;
    gap: 25px;
    align-items: center;
}

input {
    padding: 12px;
    border-radius: 12px;
    border: 2px solid #848484b1;
    width: 300px;
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
</style>
