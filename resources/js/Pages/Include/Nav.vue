<template>
    <nav>
        <ul class="flex space-x-2 divide-x-2 divide-gray-50">
            <li class="px-3 block">
                <Link href="/" :class="{ 'font-semibold': activePage === '' }">Home</Link>
            </li>
            <li class="px-3 block">
                <Link href="/posts" :class="{ 'font-semibold': activePage === 'posts' }">Posts</Link>
            </li>

            <li v-if="$page.props.auth.user !== undefined && $page.props.auth.user !== null" class="px-3 block">
                <Link href="/logout" method="post" as="button">Logout</Link>
            </li>
            <li v-else class="px-3 block">
                <Link href="/login" :class="{ 'font-semibold': activePage === 'login' }">Login</Link>
            </li>
        </ul>
    </nav>
</template>

<script>

import { Link } from '@inertiajs/vue3'

export default {
    name: 'Nav',
    components: {
        Link
    },

    data() {
        return {
            activePage: this.$page.url.split('/')
        }
    }
}
</script>

<style lang="scss" scoped></style>
