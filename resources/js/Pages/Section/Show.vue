<template>
    <Head title="Show Sections"/>
    <AuthenticatedLayout>
        <template #header>
            <PageHeader>Show Section</PageHeader>
        </template>

        <BodyCard>
            <div class="flex justify-end mb-4">
                <Link :href="route('section.create')"
                      class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 border border-transparent rounded-md hover:bg-gray-700">
                    Create Section
                </Link>
            </div>

            <div class="mb-4">
                <table class="w-full border">
                    <thead>
                    <tr>
                        <th class="bg-gray-50 w-[30px] px-6 py-3 text-left">
                            <span class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">ID</span>
                        </th>
                        <th class="bg-gray-50 px-6 w-[30px] py-3 text-left">
                            <span class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Name</span>
                        </th>
                        <th class="w-40 px-6 py-3 text-left bg-gray-50">
                        </th>
                    </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                    <tr v-if="sections.length > 0" v-for="section in sections" :key="section.id" class="bg-white">
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ section.id }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap ">
                            {{ section.name }}
                        </td>
                        <td class="flex justify-end mt-1 space-x-3 me-4">
                            <a :href="route('section.edit', section.id)"
                               class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-black uppercase border border-gray-800 rounded-md hover:border-transparent hover:text-white hover:bg-gray-700">
                                Edit
                            </a>
                            <button class="px-4 py-2 text-xs text-white uppercase bg-red-600 border border-transparent rounded-md hover:bg-red-300 hover:text-red-700">
                                Delete
                            </button>
                        </td>
                    </tr>

                    <tr v-else>
                        <td colspan="3"
                            class="px-6 py-4 leading-5 text-center text-gray-900 whitespace-no-wrap">
                            No sections were found.
                        </td>
                    </tr>

                    </tbody>
                </table>
                <div class="mt-4">
                    <!--                    {{ $questions->links() }}-->

                </div>
            </div>

        </BodyCard>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, Link} from "@inertiajs/vue3";
import PageHeader from "@/Components/PageHeader.vue";
import BodyCard from "@/Components/BodyCard.vue";

defineProps({
    sections : Array
})
</script>

<style scoped>

</style>
