<template>
    <Link v-if="type === 'black'" class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-gray-700">
        <slot/>
    </Link>
    <Link v-else-if="type === 'green'" class="inline-flex items-center rounded-md border border-transparent bg-emerald-500 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-emerald-400">
        <slot/>
    </Link>
    <Link v-else class="inline-flex items-center rounded-md border border-gray-800  px-4 py-2 text-xs font-semibold uppercase tracking-widest text-black hover:border-transparent hover:text-white hover:bg-gray-700">
        <slot/>
    </Link>
</template>

<script setup>
    import {Link} from "@inertiajs/vue3";
    defineProps({
        type : String
    })
</script>

<style scoped>

</style>
