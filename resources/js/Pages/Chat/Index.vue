<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Chats
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
                            class="flex-[7] mr-4 h-[70vh] border rounded-xl bg-white border-gray-200 relative p-4"
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
                            class="flex-[3] p-4 border bg-white border-grey-300 rounded-xl"
                        >
                            <h3 class="text-gray-700 text-lg text-center">
                                Users
                            </h3>
                            <div class="flex items-center mb-4 justify-between">
                                <a
                                    v-if="!isGroup"
                                    @click.prevent="isGroup = true"
                                    class="bg-indigo-600 text-white text-xs px3 py2 rounded-lg p-2"
                                    href="#"
                                    >Make group</a
                                >
                                <div v-if="isGroup">
                                    <input
                                        type="text"
                                        placeholder="group title"
                                        v-model="title"
                                        class="border border-gray-400 rounded-ful h-8 mr-2"
                                    />
                                    <a
                                        @click.prevent="storeGroup"
                                        :class="[
                                            ' text-white text-xs px-3 py-2 mr-2 rounded-lg p-2',
                                            userIds.length > 1
                                                ? 'bg-green-600 '
                                                : 'bg-green-300',
                                        ]"
                                        href="#"
                                        >Go chat</a
                                    >
                                    <a
                                        @click.prevent="refreshUserIds"
                                        class="bg-indigo-600 text-white text-xs px-3 py-2 rounded-lg p-2"
                                        href="#"
                                        >X</a
                                    >
                                </div>
                            </div>

                            <div v-if="users">
                                <div
                                    v-for="user in users"
                                    :key="user.id"
                                    class="flex items-center justify-between mb-2 border-b border-grey-300 hover:bg-gray-500 rounded cursor-pointer transition p-4"
                                >
                                    <div
                                        class="flex items-center"
                                        @click.prevent="store(user.id)"
                                    >
                                        <span class="mr-2 text-grey-700">{{
                                            user.id
                                        }}</span>
                                        <span class="text-grey-800">{{
                                            user.name
                                        }}</span>
                                    </div>
                                    <div v-if="isGroup">
                                        <input
                                            @click="toggleUsers(user.id)"
                                            type="checkbox"
                                        />
                                    </div>
                                </div>
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

    data() {
        return {
            isGroup: false,
            userIds: [],
            title: null,
        };
    },

    components: {
        Link,
    },

    layout: AuthenticatedLayout,

    methods: {
        store(id) {
            this.$inertia.post("/chats", {
                title: null,
                users: [id],
            });
        },

        storeGroup() {
            if (this.userIds.length < 1) {
                alert("Please select at least one user for group chat.");
                return;
            }
            this.$inertia.post("/chats", {
                title: this.title,
                users: this.userIds,
            });
        },

        toggleUsers(id) {
            let index = this.userIds.indexOf(id);
            if (index === -1) {
                this.userIds.push(id);
            } else {
                this.userIds.splice(index, 1);
            }
        },

        refreshUserIds() {
            this.userIds = [];
            this.isGroup = false;
        },
    },
};
</script>

<style lang="scss" scoped></style>
