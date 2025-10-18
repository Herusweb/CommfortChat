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
                <!-- CHAT COLUMN: сделан flex-col, высота контролируется здесь -->
                <div
                    class="w-5/6 mr-4 h-[70vh] border rounded-xl bg-white border-gray-200 relative p-4 flex flex-col"
                >
                    <h3 class="text-gray-700 mb-4 text-lg text-center">
                        {{ chat.title ?? "Your chat" }}
                    </h3>

                    <!-- Сообщения: занимает доступное пространство и скроллится -->
                    <div
                        class="flex-1 overflow-auto mb-4"
                        ref="messagesContainer"
                        v-if="messages !== undefined"
                    >
                        <div
                            v-for="message in messages"
                            :key="message.id"
                            class="mb-2 p-2 border-b border-gray-200 flex"
                            :class="
                                message.is_owner
                                    ? 'justify-end'
                                    : 'justify-start'
                            "
                        >
                            <div
                                :class="
                                    message.is_owner
                                        ? 'bg-green-100 text-gray-900 rounded-br-none border border-green-300 p-3 rounded-2xl '
                                        : 'bg-blue-100 text-gray-900 rounded-bl-none border border-blue-300 p-3 rounded-2xl '
                                "
                            >
                                <p class="text-sm font-medium text-gray-700">
                                    {{ message.user_name }}
                                </p>
                                <p class="text-gray-800">{{ message.body }}</p>
                                <p class="text-xs italic text-gray-400">
                                    {{ message.time }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-auto flex items-center gap-2">
                        <input
                            class="flex-1 border rounded-xl p-2"
                            type="text"
                            v-model="body"
                            placeholder="Type your message..."
                        />
                        <button
                            @click.prevent="store()"
                            class="bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600"
                        >
                            Send
                        </button>
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
                            class="flex items-center mb-2 border-b border-grey-300 hover:bg-gray-100 rounded cursor-pointer transition p-4"
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
import axios from "axios";
export default {
    name: "Show",

    props: ["chat", "users", "messages"],

    data() {
        return {
            body: "",
            errors: {},
        };
    },

    components: {
        AuthenticatedLayout,
    },

    computed: {
        userIds() {
            return this.users
                .map((user) => {
                    return user.id;
                })
                .filter((userId) => {
                    return userId !== this.$page.props.auth.user.id;
                });
        },
    },

    methods: {
        store() {
            axios
                .post("/messages", {
                    chat_id: this.chat.id,
                    body: this.body,
                    user_Ids: this.userIds,
                })
                .then((res) => {
                    this.messages.push(res.data);
                    this.body = "";
                    this.scrollToBottom();
                });
        },
        scrollToBottom() {
            this.$nextTick(() => {
                const container = this.$el.querySelector(".overflow-auto");
                container.scrollTop = container.scrollHeight;
            });
        },
    },
    mounted() {
        this.scrollToBottom();
    },
};
</script>

<style lang="scss" scoped></style>
