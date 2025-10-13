<template>
    <div class="flex">
        <div
            class="w-5/6 mr-4 h-[80vh] border rounded-xl bg-orange-100 border-grey-200 p-4"
        ></div>
        <div
            class="w-1/6 p-4 border bg-orange-100 border-grey-300 rounded-xl"
        ></div>
    </div>
</template>

<script>
import Main from "@/Layouts/Main.vue";
export default {
    name: "Index",

    props: ["chat"],

    layout: Main,
};
</script>

<style lang="scss" scoped></style>
