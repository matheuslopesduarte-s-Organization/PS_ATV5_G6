<script setup>
import headerComponent from '@/components/adminHeaderComponent.vue'
import footerComponent from '@/components/footerComponent.vue'

</script>
<template>
    <headerComponent activeButton="adicionar_livro" />
    <main>
        <section class="adicionar">
            <h1>Adicionar livro</h1>
            <form >
                <div style="display:flex;gap:15px;">
                <div>
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" />
                    <label for="paginas">Quantidade de páginas</label>
                    <input type="number" id="paginas" />
                    <label for="genero">Gênero</label>
                    <input type="text" id="genero" />
                    <label for="Sinopse">Sinopse</label>
                    <textarea id="Sinopse"></textarea>
                </div>
                <div>
                    <label for="estoque">Estoque</label>
                    <input type="number" id="estoque" />
                    <label for="capa">Capa</label>
                    <input type="file" accept="image/*" id="capa" />
                </div>
            </div>
                <button>Adicionar</button>
            </form>
        </section>
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
.adicionar {
    box-shadow: 1px 1px 10px 2px #0000001A;
    border-radius: 15px;
    font-family: 'Inter', sans-serif;
    padding: 35px;
    margin-bottom: 50px;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

label {
    display: block;
    margin-left: 10px;
}

input {
    padding: 10px 15px;
    border: 1px solid #848484;
    border-radius: 15px;
    margin-bottom: 20px;
}

textarea {
    padding: 10px 15px;
    border: 1px solid #848484;
    border-radius: 15px;
    margin-bottom: 20px;
    resize: vertical
}
</style>