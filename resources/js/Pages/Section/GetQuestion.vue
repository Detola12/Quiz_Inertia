<template>
    <Head title="Show Section Question"/>
    <AuthenticatedLayout>
        <template #header>
            <PageHeader>Show Section Question</PageHeader>
        </template>

        <BodyCard>
            <div class="flex justify-between mb-4">
                <h3 class="font-bold text-xl uppercase">{{ section_questions.name }}</h3>
                <CustomLink type="black" :href="route('question.create', {'section_id' :  section_questions.id })">
                    Add Question
                </CustomLink>
            </div>

            <div class="mb-4">
                <table class="w-full border">
                    <thead>
                    <tr class="">
                        <th class="bg-gray-50 w-[5px] px-6 py-3 text-left">
                            <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">ID</span>
                        </th>
                        <th class="bg-gray-50 px-6 w-[200px] py-3 text-left">
                            <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Name</span>
                        </th>
                        <th class="w-40 bg-gray-50 px-6 py-3 text-left">
                        </th>
                    </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200 divide-solid" >
                    <tr v-for="(question, index) in section_questions.questions" :key="question.id" class="bg-white">
                        <td  class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ index + 1 }}
                        </td>
                        <td class=" px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ question.text }}
                        </td>
                        <td class="flex justify-end items-center me-4 mt-2 space-x-3">
                            <CustomLink :href="route('question.edit', question.id)">
                                Edit
                            </CustomLink>
                            <button @click="remove(question.id)" class="inline-flex items-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-xs uppercase text-white hover:bg-red-300 hover:text-red-700">
                                Delete
                            </button>
                        </td>
                    </tr>

<!--                                        <tr >
                                            <td colspan="3"
                                                class="px-6 py-4 text-center leading-5 text-gray-900 whitespace-no-wrap">
                                                No questions were found.
                                            </td>
                                        </tr>-->

                    </tbody>
                </table>
                <div class="mt-4 flex justify-end  space-x-3">
                    <!--                    {{ $questions->links() }}-->
                    <!--                    <Component :is="link.url != null ? Link : 'span'" class="rounded-xl px-5 py-3 hover:bg-gray-100" :class="{ 'bg-red-600 text-white hover:bg-red-600' : link.active}" :href="link.url" v-for="link in questions.links" v-html="link.label"></Component>-->
                </div>
            </div>

        </BodyCard>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import BodyCard from "@/Components/BodyCard.vue";
import CustomLink from "@/Components/CustomLink.vue";

let props = defineProps({
    'section_questions': Object,
})

</script>

<style scoped>

</style>
