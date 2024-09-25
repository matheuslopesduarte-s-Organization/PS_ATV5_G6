<script setup>

const props = defineProps({
    titles: {
        type: Array,
        default: () => [],
    },
    itens: {
        type: Array,
        default: () => [],
    }
})
console.log(props.itens)
const itens = props.itens;
</script>
<template>
    <section class="tb">
        <table v-if="itens.length >= 1">
            <thead>
                <tr>
                    <th v-for="title in titles" :key="title">{{ title }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in itens" :key="item">
                    <td v-for="subitem in item" :key="subitem">{{ subitem }}</td>
                </tr>
            </tbody>

        </table>
        <p v-if="itens.length < 1">Nenhum item encontrado</p>
    </section>
</template>
<style scoped>
.search {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 20px;
}

.search input {
    padding: 10px 15px;
    border: 1px solid #848484;
    border-radius: 15px;
    width: 450px;
}

.search img {
    width: 20px;
    margin-left: -35px;
}

table {
    box-shadow: 1px 1px 10px 2px #0000001A;
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 16px;
    text-align: left;
    font-family: 'Inter', sans-serif;
}

table th,
table td {
    padding: 15px 15px;
    border: 1px solid #ddd;
}

table th {
    font-weight: bold;
}

table td:last-child {
    text-align: center;
}

table {
    border-radius: 10px;
    overflow: hidden;
}

table {
    border: 2px solid #e1e1e1;
}

section p {
    font-family: 'Inter', sans-serif;
}
</style>
