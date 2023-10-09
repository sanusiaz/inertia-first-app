<template>
    <Header :pageTitle="pageTitle"></Header>

    <div
        class="px-4 py-8 md:flex-1 md:p-12 md:overflow-y-auto"
        scroll-region=""
    >
        <div><!----><!----></div>
        <div>
            <!---->
            <h1 class="mb-8 text-3xl font-bold">
                <Link class="text-indigo-400 hover:text-indigo-600"
                    href="/posts"
                    >Posts</Link><span class="text-indigo-400 font-medium">/</span> Create
            </h1>
            <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
                <form action="/posts" enctype="multipart/form-data">
                    <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                        <div class="pb-8 pr-6 w-full lg:w-full">
                            <label
                                class="form-label"
                                for="title"
                                >Title:</label
                            ><input
                                id="title"
                                class="border w-full border-gray-400 placeholder:text-gray-400 text-gray-700 block p-2 py-1 "
                                type="text"
                                placeholder="Enter Post Title"
                                v-model="title"
                            /><!---->
                        </div>


                        <div class="pb-8 pr-6 w-full lg:w-full">
                            <label
                                class="form-label"
                                for="description"
                                >Description:</label
                            ><textarea
                                id="description"
                                rows="10"
                                v-model="description"
                                class="border border-gray-400 placeholder:text-gray-400 text-gray-700 block p-2 w-full py-1 "

                            ></textarea> <!---->
                        </div>

                        <div class="pb-8 pr-6 w-full lg:w-1/2">
                            <label
                                class="form-label"
                                for="image"
                                >Image:</label
                            ><input
                                id="image"
                                @change="previewImage"
                                ref="photo"
                                type="file"
                                class="border border-gray-400 placeholder:text-gray-400 text-gray-700 block p-2 py-1 "

                            />
                              <img
                                    v-if="url"
                                    :src="url"
                                    class="w-full mt-4 h-80"
                                />
                        </div>



                    </div>
                    <div
                        class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100"
                    >
                        <Link
                            href="/posts"
                            method="post"
                            preserve-scroll
                            as="button"
                            :data="{title, description, image}"
                            type="submit"
                            class="flex items-center bg-slate-900 text-white px-5 py-3 rounded-md"
                        >
                            <!---->Create Post
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

import { useForm } from '@inertiajs/vue3'

import Header from "../Include/Header.vue";

export default {
    props: {},

    data() {
        return {
            pageTitle: "Create New Post",
            title: null,
            description: null,
            image: null,
            url: null
        };
    },

    components: {
        Header,
        useForm
    },

    methods: {
        previewImage(e) {
            const file = e.target.files[0];
            this.image = file
            this.url = URL.createObjectURL(file);
        },
    },
};
</script>

<style lang="scss" scoped></style>
