<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <footer>
        <div class="divisoria">
            <a><img class="icon" src="/icons/instagram-logo.png" /></a>
            <a><img class="icon" src="/icons/x-logo.png" /></a>
            <a><img class="icon" src="/icons/github-logo.png" /></a>
        </div>
        <div class="divisoria">
            <Link :href="route('home')" class="link">Info</Link>
            <span>•</span>
            <Link :href="route('home')" class="link">Suporte</Link>
            <span>•</span>
            <Link :href="route('home')" class="link">Contato</Link>
        </div>
        <div style="display: inline-flex; align-items: center; user-select: none">
            <span>© 2024</span>
            <span>
                <img style="height: 32px" class="logo" src="/icons/logo-grande.png" />
            </span>
        </div>
    </footer>
</template>
<style scoped>
footer {
    background-color: #5e8194;
    color: white;
    text-align: center;
    padding: 10px;
    width: calc(100% - 20px);
    color: black;
    text-decoration: none;
    font-family: 'Inter', sans-serif;
}

.icon {
    width: 35px;
    height: 35px;
    margin: 10px;
    user-select: none;
}

.divisoria {
    margin: 6px 0px;
}

.icon:hover {
    opacity: 0.7;
    cursor: pointer;
}

.link {
    color: black;
    text-decoration: none;
    padding-right: 4px;
    padding-left: 4px;
}

.link:hover {
    text-decoration: underline;
}
</style>
