<template>
    <Link class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-gray-700">
        <slot/>
    </Link>
</template>

<script setup>
    import {Link} from "@inertiajs/vue3";
</script>

<style scoped>

</style>
