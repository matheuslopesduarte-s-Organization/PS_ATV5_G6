<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps(['show', 'onClose']);
const emit = defineEmits(['genreAdded']);

const form = useForm({
    name: '',
});

const addGenre = () => {
    form.post('/admin/genres', {
        onSuccess: () => {
            emit('genreAdded', form.name);
            props.onClose(); 
        },
        onError: (errors) => {
            console.error(errors); 
        },
        preserveState: true,
    });
};

const closeModal = () => {
    props.onClose();
};
</script>
<template>
    <div class="modal">
        <div class="modal-content">
            <span class="close" @click="closeModal">&times;</span>
            <h2>Adicionar Gênero</h2>
            <form @submit.prevent="addGenre">
                <input v-model="form.name" type="text" placeholder="Nome do Gênero" required />
                <button type="submit">Adicionar</button>
            </form>
        </div>
    </div>
</template>

<style scoped>
.modal {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    width: 300px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.close {
    float: right;
    cursor: pointer;
    font-size: 24px;
}
</style>
