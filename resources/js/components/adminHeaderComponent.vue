<script setup>
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'

const props = defineProps({
    isTransparent: {
        required: false,
        type: Boolean,
        default: false
    },
    activeButton: {
        required: false,
        type: String,
        default: 'home'
    }
})
const background = ref({
    backgroundColor: 'white'
})

if (props.isTransparent) {
    background.value = {
        backgroundColor: 'transparent'
    }
}

document.addEventListener('scroll', () => {
    if (window.scrollY > 0 && !props.isTransparent) {
        background.value = {
            backgroundColor: 'white',
            boxShadow: '0px 0px 10px rgba(0, 0, 0, 0.1)'
        }
    } else if (window.scrollY == 0 && !props.isTransparent) {
        background.value = {
            backgroundColor: 'white'
        }
    }
})
</script>
<template>
    <header :style="background">
        <span class="itens">
            <Link :class="activeButton == 'usuarios' ? 'active link' : 'link'" :href="route('admin.usuarios')">Usuários
            </Link>
            <Link :class="activeButton == 'acervo' ? 'active link' : 'link'" :href="route('admin.acervo')">Acervo</Link>
            <Link :class="activeButton == 'adicionar_livro' ? 'active link' : 'link'" class="link" :href="route('admin.acervo.adicionar')">Adicionar livro</Link>
            <Link :class="activeButton == 'emprestimos' ? 'active link' : 'link'" :href="route('admin.emprestimos')">Empréstimos</Link>
        </span>
        <span class="itens">
            <Link v-if="$page.props.auth.user" :href="route('logout')" method="post" as="button" class="logout">Logout</Link>
            <Link :class="activeButton == 'cadastrar' ? 'hide cadastrar' : 'cadastrar'" :href="route('home')">Voltar 
            </Link>
        </span>
    </header>
</template>
<style scoped>
header {
    z-index: 1;
    color: white;
    text-align: center;
    padding: 10px;
    position: fixed;
    top: 0;
    width: 100%;
    color: black;
    text-decoration: none;
    font-family: 'Inter', sans-serif;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.link {
    color: black;
    text-decoration: none;
    font-weight: 700;
}

.link:hover {
    text-decoration: underline;
}

.link:active {
    color: #5e8194;
}

.itens {
    display: flex;
    align-items: center;
    gap: 45px;
    margin-left: 15px;
}

.logo {
    user-select: none;
}

.login {
    background-color: #333333;
    padding: 10px 20px;
    border-radius: 25px;
    color: white;
    text-decoration: none;
    font-weight: 700;
}

.login:hover {
    background-color: #424242;
}

.login:active {
    background-color: #5e8194;
}

.cadastrar {
    padding: 10px 20px;
    border-radius: 5px;
    color: black;
    text-decoration: none;
    font-weight: 700;
    margin: 0;
    margin-right: 50px;
}

.cadastrar:hover {
    text-decoration: underline;
}

.cadastrar:active {
    color: #5e8194;
}

.logout {
    background-color: #333333;
    padding: 10px 20px;
    border-radius: 25px;
    color: white;
    text-decoration: none;
    font-weight: 700;
    margin: 0;
    cursor: pointer;
    border: none;
}

.hide {
    display: none;
}

.active {
    color: #5e8194;
}
</style>
