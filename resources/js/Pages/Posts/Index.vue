<template>
    <Header :pageTitle="this.title"></Header>

    <section class="p-10 max-w-5xl m-auto pb-0">
        <!-- Show All Error Messages  -->
        <ul v-if="$page.props.flash.success === null" class="flex flex-col gap-1">
            <li v-for="error in getErrorMessage" class="text-xs text-red-500">{{ error  }}</li>
        </ul>

        <div class="flex justify-between mt-5">
             <span>All Posts </span>

             <Link class="font-semibold rounded-md text-center text-white bg-blue-500 hover:bg-blue-900 hover:duration-200 transition-all duration-200 p-3" href="/posts/create">Create New Post</Link>

        </div>

       <div v-if="posts.length > 0" class="grid grid-cols-3 gap-5 divide-x divide-y divide-gray-200">
            <div v-for="post in posts" class="card bg-white rounded-sm border border-gray-100 p-2 shadow-md">
                <img class="w-full h-[200px]" :src="post.image" alt="{{ post.title }}">

                <div class="flex flex-col gap-2">
                    <Link :href="`/posts/` + post.id" class="font-semibold text-xl my-5 mb-0">{{ post.title }}</Link>
                    <span class="font-normal mt-0 text-sm block relative">{{ post.description }}</span>
                </div>

                <div class="flex items-center space-x-3 mt-5">
                    <Link title="Edit Post" :href="`/posts/` + post.id + `/edit`" class="font-semibold text-white rounded-md border border-gray-200 bg-blue-400 text-xs p-2 py-1">Edit Posts</Link>
                    <Link title="Delete Post" method="DELETE" :href="`/posts/` + post.id" class="font-semibold text-white rounded-md border border-gray-200 bg-red-600 text-xs p-2 py-1">Delete Posts</Link>
                </div>
            </div>
       </div>

       <div class="font-semibold text-xl text-center flex align-center items-center h-[200px] justify-center" v-else>
            No Posts Found
       </div>
    </section>
</template>

<script>

    import Header from '../Include/Header.vue'
    export default {
        name: 'Posts',
        components: {
            Header
        },

        props: {
            posts: Array,
        },

        data() {
            return {
                title: 'Posts',
                errors: null,
            }
        },

        computed: {
            getErrorMessage() {
                this.errors = [];
                // check if there is any error
                if ( this.$page.props.errors !== null ) {
                    let __errors = this.$page.props.errors;
                    this.errors.push(__errors.name)
                    this.errors.push(__errors.email)
                    this.errors.push(__errors.password)
                }

                // check for custom error messages
                if ( this.$page.props.flash.error !== null ) {
                    this.errors.push(this.$page.props.flash.error)
                }

                return this.errors
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
