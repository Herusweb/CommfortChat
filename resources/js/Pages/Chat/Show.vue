<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>
        <div class="py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                Привет, {{ $page.props.auth.user.name }}!
            </div>
            <div class="flex">
                <div
                    class="w-5/6 mr-4 h-[70vh] border rounded-xl bg-white border-gray-200 relative p-4"
                >
                    <h3 class="text-gray-700 mb-4 text-lg text-center">
                        {{ chat.title ?? "Your chat" }}
                    </h3>
                    гнпгп
                    <div
                        class="absolute bottom-0 left-0 w-full p-1 bg-white border-t border-gray-200 flex items-center gap-2"
                    >
                        <input
                            class="flex-1 border rounded-xl p-2"
                            type="text"
                            v-model="body"
                            placeholder="Type your message..."
                        />
                        <a
                            @click.prevent="store()"
                            href=""
                            class="bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600"
                            >Send</a
                        >
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
                            <span class="text-grey-800">{{ user.name }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
export default {
    name: "Show",

    props: ["chat", "users"],

    data() {
        return {
            body: "",
        };
    },

    layout: AuthenticatedLayout,

    methods: {
        store() {
            axios.post("/messages", {});
        },
    },
};
</script>

<style lang="scss" scoped></style>
