<template>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>


                       <!-- Show All Error Messages  -->
                    <ul v-if="$page.props.flash.success === null" class="flex flex-col gap-1">
                        <li v-for="error in getErrorMessage" class="text-xs text-red-500">{{ error  }}</li>
                    </ul>

                    <div v-if="$page.props.flash.success !== null">
                    <span class="font-semibold text-green-500 text-sm block text-center "> {{  $page.props.flash.success  }}</span>
                    </div>
                    <form class="space-y-4 md:space-y-6" action="#" method="post">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                email</label>
                            <input type="email" v-model="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" v-model="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div>


                            <Link href="/forget-password"
                                class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot
                            password?</Link>
                        </div>
                        <Link type="submit"
                            method="post"
                            as="button"
                            :data="{email, password}"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign
                            in</Link>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Don’t have an account yet? <Link href="/register"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</Link>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<script>


import Nav from './Include/Nav.vue'
export default {
    name: 'Settings',
    components: {
        Nav
    },

    data() {
        return  {
            email: null,
            password: null,

            errors: [],

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

<style lang="scss" scoped></style>
