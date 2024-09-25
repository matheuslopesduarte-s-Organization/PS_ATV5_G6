<script setup>
import headerComponent from '@/components/adminHeaderComponent.vue';
import footerComponent from '@/components/footerComponent.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import genresModal from '@/components/modals/genresModal.vue';

const props = defineProps(['genres']);
const showModal = ref(false);

const form = useForm({
    isbn: '',
    title: '',
    author: '',
    classification: '',
    synopsis: '',
    cover: '',
    stock: '',
    genre_id: '',
});

const genres = ref(props.genres);

function convertImageToBase64(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.onloadend = () => {
            resolve(reader.result);
        };
        reader.onerror = reject;
        reader.readAsDataURL(file);
    });
};
async function submit() {
    if (form.cover) {
        form.cover = await convertImageToBase64(form.cover);
    }
    form.post('/admin/acervo/adicionar');
};
function openAddGenreModal() {
    showModal.value = true;
};

function deleteGenre() {
    form.delete(route('admin.acervo.genre.delete', { id: form.genre_id }), {
        onSuccess: () => {

        },
        onError: (error) => {
            alert(error.error)
        },
        preserveState: true,
    })
}

</script>

<template>

    <Head title="(Admin) Adicionar livro" />
    <headerComponent activeButton="adicionar_livro" />
    <main>
        <section class="adicionar">
            <h1>Adicionar livro</h1>
            <form @submit.prevent="submit">
                <div style="display:flex;gap:90px;">
                    <div class="row">
                        <span class="error-msg" v-if="form.errors.isbn" role="alert">
                            {{ form.errors.isbn }}
                        </span>
                        <label for="isbn">ISBN</label>
                        <input type="text" id="isbn" v-model="form.isbn" required />

                        <span class="error-msg" v-if="form.errors.title" role="alert">
                            {{ form.errors.title }}
                        </span>
                        <label for="title">Título</label>
                        <input type="text" id="title" v-model="form.title" required />

                        <span class="error-msg" v-if="form.errors.author" role="alert">
                            {{ form.errors.author }}
                        </span>
                        <label for="author">Autor</label>
                        <input type="text" id="author" v-model="form.author" required />

                        <span class="error-msg" v-if="form.errors.classification" role="alert">
                            {{ form.errors.classification }}
                        </span>
                        <label for="classification">Classificação</label>
                        <select id="classification" v-model="form.classification" required>
                            <option value="">Selecione uma classificação</option>
                            <option value="children">Infantil</option>
                            <option value="teen">Juvenil</option>
                            <option value="adult">Adulto</option>
                        </select>

                        <span class="error-msg" v-if="form.errors.synopsis" role="alert">
                            {{ form.errors.synopsis }}
                        </span>
                        <label for="synopsis">Sinopse</label>
                        <textarea id="synopsis" v-model="form.synopsis" required></textarea>
                    </div>
                    <div class="row">

                        <span class="error-msg" v-if="form.errors.stock" role="alert">
                            {{ form.errors.stock }}
                        </span>
                        <label for="stock">Estoque</label>
                        <input type="number" id="stock" v-model="form.stock" required />

                        <span class="error-msg" v-if="form.errors.cover" role="alert">
                            {{ form.errors.cover }}
                        </span>
                        <label for="cover">Capa</label>
                        <input type="file" accept="image/*" id="cover" @change="e => form.cover = e.target.files[0]" />

                        <span class="error-msg" v-if="form.errors.genre_id" role="alert">
                            {{ form.errors.genre_id }}
                        </span>
                        <label for="genre_id">Gênero</label>
                        <select id="genre_id" v-model="form.genre_id" required>
                            <option value="">Selecione um gênero</option>
                            <option v-for="genre in genres" :key="genre.id" :value="genre.id">{{ genre.name }}</option>
                        </select>
                        <div>
                            <button type="button" @click="openAddGenreModal">Adicionar Gênero</button>
                            <button type="button" @click="deleteGenre">Deletar Gênero Selecionado</button>
                        </div>
                    </div>
                </div>
                <button type="submit">Adicionar</button>
            </form>
            <genresModal v-if="showModal" @show="showModal" @close="showModal = false" />
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

input,
select,
textarea {
    padding: 10px 15px;
    border: 1px solid #848484;
    border-radius: 15px;
    margin-bottom: 20px;
}

.row {
    display: flex;
    flex-direction: column;
}

.error-msg {
    color: red;
    font-size: 14px;
    font-weight: 500;
}
</style>
