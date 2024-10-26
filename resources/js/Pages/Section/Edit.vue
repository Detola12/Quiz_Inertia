<template>
    <Head title="Create Section"/>

    <AuthenticatedLayout>
        <template #header>
            <PageHeader>
                Edit Section
            </PageHeader>
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
import PageHeader from "@/Components/PageHeader.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {useForm, Head} from "@inertiajs/vue3";

let props = defineProps({
    'section' : Array,
})

let form = useForm({
    'section' : props.section.name
})

let submit = () => {
    form.patch(route('section.update', props.section.id))
}

</script>

<style scoped>

</style>
