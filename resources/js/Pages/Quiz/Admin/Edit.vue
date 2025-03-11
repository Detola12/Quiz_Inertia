<template>
    <AuthenticatedLayout>
        <template #header>
            <PageHeader>
                Edit Quiz
            </PageHeader>
        </template>

        <BodyCard>
            <form @submit.prevent="submit" class="w-full">
                <div>
                    <InputLabel class="mb-2 ">Title</InputLabel>
                    <TextInput v-model="form.quiz" class="w-full placeholder:text-sm" placeholder="What would like to name this quiz"></TextInput>
                    <div v-if="form.errors.quiz" class="text-red-500 text-sm mt-2">{{ form.errors.quiz }}</div>

                </div>
                <div class="mx-2">
                    <h4 class="text-gray-700 text-[21px] font-semibold mt-5">Questions</h4>
                    <ul class="max-w-lg divide-y divide-gray-200 mt-1">
                        <li class="pb-3 sm:pb-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex flex-col space-y-3 w-full">
                                    <div v-for="(question, index) in selectedQuestions" :key="question.id" class="text-sm flex justify-between">
                                        <p>
                                            {{ index + 1 }} . {{ question.text }}
                                        </p>
                                        <button @click="removeQuestion(question.id)" class="text-red-600">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
                <div class="mt-4">
                    <PrimaryButton :disabled="form.processing">Submit</PrimaryButton>
                </div>
            </form>
        </BodyCard>

        <BodyCard>
            <div class="mb-4 flex justify-between">
                <div>
                    <TextInput placeholder="Type to search" class="placeholder:text-sm h-9" v-model="search"></TextInput>
                </div>
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
                    <tr v-if="props.questions.length > 0"  v-for="question in filteredQuestions" :key="question.id" class="bg-white">
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ question.id }}
                        </td>
                        <td class=" px-6 py-4 w-2/12 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ question.section.name }}
                        </td>
                        <td class=" px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ question.text }}
                        </td>
                        <td class="flex justify-end items-center me-4 mt-1.5 space-x-3">

                            <button @click="addQuestion(question.id)" class="inline-flex items-center rounded-md border border-transparent bg-[#04d13b] px-4 py-2 text-xs uppercase text-white hover:bg-green-300 hover:text-green-700">
                                Add
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
                <div class="mt-4 flex justify-end space-x-3">
                    <Component :is="link.url != null ? Link : 'span'" :href="link.url" v-for="link in questions.links" v-html="link.label"></Component>
                </div>
            </div>
        </BodyCard>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import BodyCard from "@/Components/BodyCard.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {useForm} from "@inertiajs/vue3";
import {computed} from "vue";

let props = defineProps({
    'quiz_questions' : Array,
    'questions' : Array,
    'quiz' : String
})


let form = useForm({
    'quiz' : props.quiz.name,
    'question' : props.quiz_questions.map(item => item.id),
})

let addQuestion = (id) => {
    if (!form.question.includes(id)) {
        form.question.push(id)
    }
}

let removeQuestion = (id) => {
    if (form.question.includes(id)){
        let index = form.question.indexOf(id)
        form.question.splice(index,1)
    }
}


let filteredQuestions = computed(() => {
    return props.questions.filter(question => !form.question.includes(question.id));
});
let selectedQuestions = computed(() => {
    return props.questions.filter(question => form.question.includes(question.id));
});


let submit = () => {
    form.patch(route('quiz.update', props.quiz.id))
}

</script>

<style scoped>

</style>
