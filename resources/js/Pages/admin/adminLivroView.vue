<script setup>
import headerComponent from '@/components/adminHeaderComponent.vue';
import footerComponent from '@/components/footerComponent.vue';
import { Link, Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import genresModal from '@/components/modals/genresModal.vue';

const props = defineProps(['book', 'genres']);

const showModal = ref(false);

const form = useForm({
    isbn: props.book.isbn,
    title: props.book.title,
    author: props.book.author,
    classification: props.book.classification,
    synopsis: props.book.synopsis,
    cover: props.book.cover,
    stock: props.book.stock,
    genre_id: props.book.genre_id,
});

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

const fileInput = ref(null);

function triggerFileInput() {
    fileInput.value.click();
};

async function handleCoverChange(event) {
    const file = event.target.files[0];
    if (file) {
        form.cover = await convertImageToBase64(file);
    }
};

async function submit() {
    if (form.cover && typeof form.cover !== 'string') {
        form.cover = await convertImageToBase64(form.cover);
    }
    form.put(`/admin/acervo/${props.book.isbn}`);
};

const urlParams = new URLSearchParams(window.location.search);

if (urlParams.has('delete')) {
    if (confirm('Tem certeza que deseja deletar este livro?')) {
        form.delete(`/admin/acervo/${props.book.isbn}`, {
            onError: (error) => {
                alert(error.error)
            },
            preserveState: true,
        })
    }
}

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

    <Head title="(Admin) - Editar Livro" />
    <headerComponent activeButton="acervo" />
    <main>
        <span>
            <Link :href="route('admin.acervo')">Voltar à lista</Link>
        </span>
        <section class="livro">
            <img class="img" :src="form.cover ? form.cover : props.book.cover" alt="Capa do livro"
                @click="triggerFileInput" style="cursor: pointer;" />
            <input type="file" accept="image/*" ref="fileInput" @change="handleCoverChange" style="display: none;" />

            <div class="livro-info">
                <span class="error-msg" v-if="form.errors.title" role="alert">
                    {{ form.errors.title }}
                </span>
                <div class="flex">
                    <label for="title"><img src="/icons/edit.png"> Título:</label>
                    <input id="title" type="text" v-model="form.title" required/>
                </div>
                <span class="error-msg" v-if="form.errors.author" role="alert">
                    {{ form.errors.author }}
                    </span>
                <div class="flex">
                    <label for="author"><img src="/icons/edit.png"> Autor:</label>
                    <input id="author" type="text" v-model="form.author" required />
                </div>
                <span class="error-msg" v-if="form.errors.genre_id" role="alert">
                    {{ form.errors.genre_id }}
                    </span>
                <div class="flex">
                    <label for="genre_id"><img src="/icons/edit.png"> Gênero:</label>
                    <select id="genre_id" v-model="form.genre_id" required>
                        <option v-for="genre in genres" :key="genre.id" :value="genre.id">{{ genre.name }}</option>
                    </select><button type="button" @click="openAddGenreModal">Adicionar Gênero</button>
                    <button type="button" @click="deleteGenre">Deletar Gênero Selecionado</button>
                </div>
                <span class="error-msg" v-if="form.errors.classification" role="alert">
                    {{ form.errors.classification }}
                    </span>
                <div class="flex">
                    <label for="classification"><img src="/icons/edit.png"> Classificação:</label>
                    <select id="classification" v-model="form.classification" required>
                        <option value="children">Infantil</option>
                        <option value="teen">Juvenil</option>
                        <option value="adult">Adulto</option>
                    </select>
                </div>
                <span class="error-msg" v-if="form.errors.synopsis" role="alert">
                    {{ form.errors.synopsis }}
                    </span>
                <div class="flex">
                    <label for="synopsis"><img src="/icons/edit.png"> Sinopse:</label>
                    <textarea id="synopsis" v-model="form.synopsis" required></textarea>
                </div>

                <div class="btn-emprestimo">
                    <button class="btn" @click.prevent="submit">Salvar</button>
                </div>
            </div>
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
    object-fit: cover;
    cursor: pointer;
    border: 1px solid #707070;
}

.error-msg {
    color: red;
    font-size: 14px;
    font-weight: 500;
}
</style>
