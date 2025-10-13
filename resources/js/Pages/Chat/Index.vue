<template>
    <div class="flex">
        <div
            class="w-5/6 mr-4 h-[80vh] border rounded-xl bg-orange-100 border-grey-200 p-4"
        >
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis
            ipsa rem ducimus minus mollitia illum quidem, explicabo fugiat sint
            quos maiores at inventore facilis dolore fugit in ratione
            exercitationem natus.
        </div>
        <div class="w-1/6 p-4 border bg-orange-100 border-grey-300 rounded-xl">
            <h3 class="text-gray-700 mb-4 text-lg text-center">Users</h3>
            <div v-if="users">
                <a
                    @click.prevent="store(user.id)"
                    v-for="user in users"
                    :key="user.id"
                    class="flex items-center mb-2 border-b border-grey-300 hover:bg-gray-500 rounded cursor-pointer transition p-4"
                >
                    <span class="mr-2 text-grey-700">{{ user.id }}</span>
                    <span class="text-grey-800">{{ user.name }}</span>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import Main from "@/Layouts/Main.vue";
export default {
    name: "Index",

    props: ["users"],

    layout: Main,

    methods: {
        store(id) {
            this.$inertia.post("/chats", { title: null, users: [id] });
        },
    },
};
</script>

<style lang="scss" scoped></style>
