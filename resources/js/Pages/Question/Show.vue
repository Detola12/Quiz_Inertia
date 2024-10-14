<template>
    <Head title="Show Questions"/>
    <AuthenticatedLayout>
        <template #header>
            <PageHeader>Show Questions</PageHeader>
        </template>

        <BodyCard>
            <div class="mb-4 flex justify-between">
                <div>
                    <TextInput placeholder="Type to search" class="placeholder:text-sm h-9" v-model="search"></TextInput>
                </div>
                <Link :href="route('question.create')"
                      class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-gray-700">
                    Create Question
                </Link>
            </div>

            <div class="mb-4">
                <table class="w-full border">
                    <thead>
                    <tr class="">
                        <th class="bg-gray-50 w-[10px] px-6 py-3 text-left">
                            <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">ID</span>
                        </th>
                        <th class="bg-gray-50 w-[10px] px-6 py-3 text-left">
                            <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Section</span>
                        </th>
                        <th class="bg-gray-50 px-6 w-[30px] py-3 text-left">
                            <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Name</span>
                        </th>
                        <th class="w-40 bg-gray-50 px-6 py-3 text-left">
                        </th>
                    </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                    <tr v-if="questions.data.length > 0" v-for="question in questions.data" :key="question.id" class="bg-white">
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ question.id }}
                        </td>
                        <td class=" px-6 py-4 w-2/12 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ question.section.name }}
                        </td>
                        <td class=" px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ question.text }}
                        </td>
                        <td class="flex justify-end items-center me-4 mt-1 space-x-3">
                            <Link :href="route('question.edit', question.id)"
                               class="inline-flex items-center rounded-md border border-gray-800  px-4 py-2 text-xs font-semibold uppercase tracking-widest text-black hover:border-transparent hover:text-white hover:bg-gray-700">
                                Edit
                            </Link>
                            <button @click="remove(question.id)" class="inline-flex items-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-xs uppercase text-white hover:bg-red-300 hover:text-red-700">
                                Delete
                            </button>
                        </td>
                    </tr>

                    <tr v-else>
                        <td colspan="3"
                            class="px-6 py-4 text-center leading-5 text-gray-900 whitespace-no-wrap">
                            No questions were found.
                        </td>
                    </tr>

                    </tbody>
                </table>
                <div class="mt-4 flex justify-end  space-x-3">
                    <!--                    {{ $questions->links() }}-->
                    <Component :is="link.url != null ? Link : 'span'" :href="link.url" v-for="link in questions.links" v-html="link.label"></Component>
                </div>
            </div>

        </BodyCard>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, Link, router} from "@inertiajs/vue3";
import PageHeader from "@/Components/PageHeader.vue";
import BodyCard from "@/Components/BodyCard.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import {debounce} from "lodash";
import {ref, watch} from "vue";

let props = defineProps({
    questions : Object,
    filters : Object
})

let remove = (id) => {
    router.delete(route("question.delete", id), {
        onBefore: () => confirm('Are you sure you want to delete this user?'),
    });
}
let search = ref(props.filters.search);
watch(search, debounce(function (value){
    router.get("/questions", {search: value},{
        preserveState : true,
        replace : true
    });
}, 300));

</script>

<style scoped>

</style>
