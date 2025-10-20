<template>
    <div class="p-4 w-5/6 mx-auto">
        <div>
            <div class="m-4">
                <Link :href="route('chats.index')"> Chats </Link>
            </div>
        </div>
        <slot />
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";
export default {
    name: "Main",
    components: {
        Link,
    },
};
</script>

<style lang="scss" scoped></style>
