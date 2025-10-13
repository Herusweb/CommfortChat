<template>
    <div class="flex">
        <div class="w-5/6 mr-4 border border-grey-800">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis
            ipsa rem ducimus minus mollitia illum quidem, explicabo fugiat sint
            quos maiores at inventore facilis dolore fugit in ratione
            exercitationem natus.
        </div>
        <div class="w-1/6 p-2 border border-grey-600">
            <h3 class="text-gray-700 mb-4 text-lg">Users</h3>
            <div v-if="users">
                <a
                    v-for="user in users"
                    :key="user.id"
                    class="flex justify-start items-center gap-2 pb-2 mb-2 border-b border-grey-300 hover:bg-gray-100 cursor-pointer transition"
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
};
</script>

<style lang="scss" scoped></style>
