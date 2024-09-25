<script setup>
import headerComponent from '@/components/adminHeaderComponent.vue';
import footerComponent from '@/components/footerComponent.vue';
import { Link, Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps(['book', 'genres']); 

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

const convertImageToBase64 = (file) => {
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

const triggerFileInput = () => {
    fileInput.value.click();
};

const handleCoverChange = async (event) => {
    const file = event.target.files[0];
    if (file) {
        form.cover = await convertImageToBase64(file); 
    }
};

const submit = async () => {
    if (form.cover && typeof form.cover !== 'string') {
        form.cover = await convertImageToBase64(form.cover);
    }
    form.put(`/admin/acervo/${props.book.isbn}`); 
};
</script>

<template>
    <Head title="(Admin) - Editar Livro" />
    <headerComponent activeButton="acervo" />
    <main>
        <span>
            <Link :href="route('admin.acervo')">Voltar à lista</Link>
        </span>
        <section class="livro">
            <img 
                class="img" 
                :src="form.cover ? form.cover : props.book.cover" 
                alt="Capa do livro" 
                @click="triggerFileInput" 
                style="cursor: pointer;"
            />
            <input 
                type="file" 
                accept="image/*" 
                ref="fileInput" 
                @change="handleCoverChange" 
                style="display: none;"
            />

            <div class="livro-info">
                <div class="flex">
                    <label for="title"><img src="/icons/edit.png"> Título:</label>
                    <input id="title" type="text" v-model="form.title" required />
                </div>
                <div class="flex">
                    <label for="author"><img src="/icons/edit.png"> Autor:</label>
                    <input id="author" type="text" v-model="form.author" required />
                </div>
                <div class="flex">
                    <label for="genre_id"><img src="/icons/edit.png"> Gênero:</label>
                    <select id="genre_id" v-model="form.genre_id" required>
                        <option v-for="genre in genres" :key="genre.id" :value="genre.id">{{ genre.name }}</option>
                    </select>
                </div>
                <div class="flex">
                    <label for="classification"><img src="/icons/edit.png"> Classificação:</label>
                    <select id="classification" v-model="form.classification" required>
                        <option value="children">Infantil</option>
                        <option value="teen">Juvenil</option>
                        <option value="adult">Adulto</option>
                    </select>
                </div>
                <div class="flex">
                    <label for="synopsis"><img src="/icons/edit.png"> Sinopse:</label>
                    <textarea id="synopsis" v-model="form.synopsis" required></textarea>
                </div>

                <div class="btn-emprestimo">
                    <button class="btn" @click.prevent="submit">Salvar</button>
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
}
</style>
