<script setup>
import headerComponent from '@components/headerComponent.vue'
import footerComponent from '@components/footerComponent.vue'
import listComponent from '@components/listComponent.vue'

</script>
<template>
    <headerComponent />
    <main>
        <listComponent />
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
</style>