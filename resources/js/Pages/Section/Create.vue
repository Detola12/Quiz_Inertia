<template>
    <Head title="Create Section"/>

    <AuthenticatedLayout>
        <template #header>
            <PageHeader>Create Section</PageHeader>
        </template>

        <div class="container max-w-4xl mx-auto text-black/70 mt-20">
            <form @submit.prevent="submit" class="w-full">
                <div>
                    <InputLabel class="mb-2 ">Section</InputLabel>
                    <TextInput v-model="form.section" class="w-full placeholder:text-sm" placeholder="What section do you want to add"></TextInput>

                    <div class="mt-4">
                        <PrimaryButton :disabled="form.processing">Submit</PrimaryButton>
                    </div>
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

let form = useForm({
    'section' : ''
})

let submit = () => {
    form.post('/section/create')
}

</script>

<style scoped>

</style>
