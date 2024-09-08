<script setup>
import headerComponent from '@/components/adminHeaderComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
import { Link, Head } from '@inertiajs/vue3';
</script>
<template>
    <Head title="(Admin) - Editar Livro" />
    <headerComponent activeButton="emprestimo" />
    <main>
        <span>
            <Link :href="route('admin.acervo')">Voltar a lista</Link>
        </span>
        <section class="title">
            <h1>Sede - Amélie Nothomb</h1>
        </section>
        <section class="livro">
            <img class="img" src="/imagens/livro-capa.png" />
            <div class="livro-info">
                <div class="flex">
                <label for="autor"><img src="/icons/edit.png">Autor:</label>
                <input id="autor" type="text" value="Amélie Nothomb">
                </div>
                <div class="flex">
                <label for="genero"><img src="/icons/edit.png">Genero:</label>
                <input id="genero" type="text" value="X">
                </div>
                <div class="flex">
                <label for="classificacao"><img src="/icons/edit.png">Classificacao:</label>
                <select id="classificacao" type="text" value="juvenil">
                    <option value="juvenil">Juvenil</option>
                    <option value="adulto">Adulto</option>
                    <option value="infantil">Infantil</option>
                </select>
                
            </div>
            <div class="flex">
                <label for="sinopse"><img src="/icons/edit.png">Sinopse:</label>
                <textarea id="sinopse" type="text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque  ultricies, erat in sodales euismod, ex dui mattis arcu, non sagittis  felis elit vitae ipsum. Nam rhoncus sagittis augue.</textarea>
                </div>
                <div class="btn-emprestimo">
                    <button class="btn">Salvar</button>
                </div>
            </div>
        </section>
    </main>
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
    gap: 25px;
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
input {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 12px;
    font-weight: 500;
    border: none;
    background-color: #f0f0f0;
    padding: 10px;
    
    flex: 1;
}
.flex {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    gap: 10px;
}
label {
    display: flex;
    align-items: center;
    gap: 5px;

}
.flex img {
    width: 20px;
}

textarea {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 12px;
    font-weight: 500;
    border: none;
    width: 30vw;
    background-color: #f0f0f0;
    padding: 10px;
    resize: vertical;
    flex: 1;
}

.img {
    width: 300px;
    height: 450px;
}
</style>
