<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Привет, {{ $page.props.auth.user.name }}!
                    </div>
                    <div class="flex">
                        <div
                            class="w-5/6 mr-4 h-[80vh] border rounded-xl bg-white border-grey-200 p-4"
                        >
                            <h3 class="text-gray-700 mb-4 text-lg text-center">
                                Chats
                            </h3>
                            <div v-if="chats">
                                <div
                                    v-for="chat in chats"
                                    :key="chat.id"
                                    class="flex items-center mb-2 border-b border-grey-300 hover:bg-gray-500 rounded p-4"
                                >
                                    <Link
                                        :href="route('chats.show', chat.id)"
                                        class="flex items-center"
                                    >
                                        <p class="mr-2">{{ chat.id }}</p>
                                        <p>
                                            {{ chat.title ?? "Your chat" }}
                                        </p></Link
                                    >
                                </div>
                            </div>
                        </div>
                        <div
                            class="w-1/6 p-4 border bg-white border-grey-300 rounded-xl"
                        >
                            <h3 class="text-gray-700 mb-4 text-lg text-center">
                                Users
                            </h3>
                            <div v-if="users">
                                <a
                                    @click.prevent="store(user.id)"
                                    v-for="user in users"
                                    :key="user.id"
                                    class="flex items-center mb-2 border-b border-grey-300 hover:bg-gray-500 rounded cursor-pointer transition p-4"
                                >
                                    <span class="mr-2 text-grey-700">{{
                                        user.id
                                    }}</span>
                                    <span class="text-grey-800">{{
                                        user.name
                                    }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
export default {
    name: "Index",

    props: ["users", "chats"],

    components: {
        Link,
    },

    layout: AuthenticatedLayout,

    methods: {
        store(id) {
            this.$inertia.post("/chats", { title: null, users: [id] });
        },
    },
};
</script>

<style lang="scss" scoped></style>
