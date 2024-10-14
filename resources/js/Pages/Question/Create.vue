<template>
    <Head title="Create Section"/>

    <AuthenticatedLayout>
        <template #header>
            <PageHeader>Create Question</PageHeader>
        </template>

        <div class="container max-w-4xl mx-auto text-black/70 mt-20">
            <form @submit.prevent="submit" class="w-full">
                <div>
                    <InputLabel class="mb-2 ">Text</InputLabel>
                    <TextInput v-model="form.text" class="w-full placeholder:text-sm" placeholder="What question do you want to add"></TextInput>
                    <div v-if="form.errors.text" class="mt-2"></div>
                </div>

                <div class="mt-6">
                    <InputLabel>Section</InputLabel>
                    <select v-model="form.section" class="border-gray-300 w-1/4 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sms">
                        <option disabled>Select a section...</option>
                        <option v-for="section in sections" :key="section.id" :value="section.id">{{ section.name }}</option>
                    </select>
                    <div v-if="form.errors.section" class="mt-2"></div>
                </div>

                <div class="mt-8">
                    <div class="">
                        <InputLabel class="mb-2 text-center">Options</InputLabel>
                    </div>

                    <div v-for="(option, index) in form.options" :key="index">
                        <InputLabel class="mb-2 text-xs">Option {{ index + 1 }}</InputLabel>
                        <div class="flex justify-between items-center space-x-3">
                            <TextInput v-model="form.options[index]" placeholder="Give an answer" class="placeholder:text-sm w-full mb-2" ></TextInput>
                            <button type="button" @click="removeOption" class="text-red-500 pb-2 text-sm">Delete</button>
                        </div>

                        <div v-if="form.errors.options" class="mt-2"></div>
                    </div>

                    <SecondaryButton v-if="form.options.length < 5" class="mt-4" @click="addOption">Add Option</SecondaryButton>
                </div>

                <div v-if="form.options.length > 1" class="mt-6 space-x-8">
                    <label for="correctAnswer" class="mb-2">Correct Answer</label>
                    <select v-model="form.correctAnswer" class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm">
                        <option v-for="(option, index) in form.options" :key="index" :value="index + 1">
                            Option {{ index + 1 }}
                        </option>
                    </select>
                    <div v-if="form.errors.correctAnswer" class="text-red-500">{{ form.errors.correctAnswer }}</div>
                </div>

                <div class="mt-4">
                    <PrimaryButton :disabled="form.processing">Submit</PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {Head, useForm} from "@inertiajs/vue3";
import PageHeader from "@/Components/PageHeader.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

defineProps({
    sections : Array
})

let addOption = () => {
    if (form.options.length < 5) {
        form.options.push('')
    }
}

let removeOption = () => {
    if (form.options.length > 1){
        form.options.pop()
    }
}

let form = useForm({
    'text' : '',
    'options' : [''],
    'correctAnswer' : '',
    'section' : 0
})


let submit = () => {
    form.post('/question/create')
}

</script>

<style scoped>

</style>
