<template>
    <Header :title="title"></Header>

    <section class="p-10">
       <span>This is the home page</span>
    </section>
</template>

<script>

    import Header from './Include/Header.vue'
    export default {
        name: 'Welcome',
        components: {
            Header
        },

        data() {
            return {
                title: 'Home Page'
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
