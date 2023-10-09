<template>
    <header>
        <div class="flex justify-between w-full p-5 px-10 bg-gray-600 text-gray-100">
            <Link
                href="/">AppName</Link>

            <Nav />

            <div>

            </div>
        </div>
    </header>
    <div v-if="$page.props.flash.success !== null" class="block relative text-white bg-green-500 p-10 py-3">

        {{  $page.props.flash.success  }}
    </div>

     <div v-if="$page.props.flash.error !== null" class="block relative text-white bg-red-500 p-10 py-3">

        {{  $page.props.flash.error  }}
    </div>

</template>

<script>
    import Nav from './Nav.vue'

    export default {
        name: 'Header',
        components: {
            Nav
        },

        props: {
            pageTitle: {
                type: String,
                default: 'App'
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
