<template>
    <Header :pageTitle="pageTitle"></Header>

    <div
        class="px-4 py-8 md:flex-1 md:p-12 md:overflow-y-auto"
        scroll-region=""
    >
        <div><!----><!----></div>
        <div class="p-5">
            <!---->
            <h1 class="mb-8 text-3xl font-bold">
                <Link class="text-indigo-400 hover:text-indigo-600"
                    href="/posts"
                    >Posts</Link><span class="text-indigo-400 font-medium">/</span> Edit {{ post.title }}
            </h1>
            <div class="max-w-3xl p-3 bg-white rounded-md shadow overflow-hidden flex flex-col gap-4">
                <div class="flex flex-col gap-0">
                    <b>Title: </b>
                    <div>{{ post.title }}</div>
                </div>

                <div class="flex flex-col gap-0">
                    <b>Description: </b>
                    <div>{{ post.description }}</div>
                </div>

                <div class="flex flex-col gap-0">
                    <b>Uploaded Image: </b>
                    <div>
                        <img class="h-[300px] w-[500px]" :src="post.image" alt="{{ post.title }}">
                    </div>
                </div>

                <Link class="font-semibold rounded-md text-center text-white bg-blue-500 hover:bg-blue-900 hover:duration-200 transition-all w-max duration-200 p-3" :href="`/posts/` + post.id + `/edit`">Edit Post</Link>

            </div>
        </div>
    </div>
</template>

<script>


import Header from "../Include/Header.vue";

export default {
    props: {
        post: Object|null
    },

    data() {
        return {
            pageTitle: "Create New Post",
            image: null,
        };
    },

    components: {
        Header
    },



};
</script>

<style lang="scss" scoped></style>
