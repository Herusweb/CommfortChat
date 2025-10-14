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
                    class="w-5/6 mr-4 h-[80vh] border rounded-xl bg-white border-grey-200 p-4"
                ></div>
                <div
                    class="w-1/6 p-4 border bg-white border-grey-300 rounded-xl"
                ></div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
export default {
    name: "Index",

    props: ["chat"],

    layout: AuthenticatedLayout,
};
</script>

<style lang="scss" scoped></style>
