<template>
    <AuthenticatedLayout>
        <template #header>
            <PageHeader>Take Quiz -- {{ props.title }}</PageHeader>
        </template>

        <BodyCard class="container mx-auto">
            <div class="flex items-center me-6  justify-between">
                <h5 class="font-italic text-sm">Question {{ questionIndex + 1 }}</h5>
                <p class="text-xs">Timer: {{ timeLeft }}</p>
            </div>
            <div class="my-6">
                <h4 class="text-3xl font-semibold">{{ currentQuestion.text }}</h4>
            </div>
            <div class="flex flex-col gap-y-4 mt-4">
                <div class="flex">
                    <label for="hs-radio-vertical-group-1" class="text-sm text-gray-800 ms-2">
                        <input type="radio" v-model="form.answer[questionIndex]" :value="[currentQuestion.id,'a']" name="hs-radio-vertical-group" class="shrink-0 mt-0.5 border-gray-500 rounded-full text-gray-700
                        focus:ring-gray-600 disabled:opacity-50 disabled:pointer-events-none" id="hs-radio-vertical-group-1">
                        <span class="ms-5">{{ currentQuestion.answer_a }}</span>
                    </label>
                </div>

                <div class="flex">
                    <label for="hs-radio-vertical-group-2" class="text-sm text-gray-800 ms-2">
                        <input type="radio" v-model="form.answer[questionIndex]" :value="[currentQuestion.id,'b']" name="hs-radio-vertical-group" class="shrink-0 mt-0.5 border-gray-500 rounded-full text-gray-700
                        focus:ring-gray-600 disabled:opacity-50 disabled:pointer-events-none" id="hs-radio-vertical-group-2">
                        <span class="ms-5">{{ currentQuestion.answer_b }}</span>
                    </label>
                </div>

                <div class="flex">
                    <label for="hs-radio-vertical-group-3" class="text-sm text-gray-800 ms-2">
                        <input type="radio" v-model="form.answer[questionIndex]" :value="[currentQuestion.id,'c']" name="hs-radio-vertical-group" class="shrink-0 mt-0.5 border-gray-500 rounded-full text-gray-700
                        focus:ring-gray-600 disabled:opacity-50 disabled:pointer-events-none" id="hs-radio-vertical-group-3">
                        <span class="ms-5">{{ currentQuestion.answer_c }}</span>
                    </label>
                </div>
                <div class="flex">
                    <label for="hs-radio-vertical-group-4" class="text-sm text-gray-800 ms-2">
                        <input type="radio" v-model="form.answer[questionIndex]" :value="[currentQuestion.id,'d']" name="hs-radio-vertical-group" class="shrink-0 mt-0.5 border-gray-500 rounded-full text-gray-700
                        focus:ring-gray-600 disabled:opacity-50 disabled:pointer-events-none" id="hs-radio-vertical-group-4">
                        <span class="ms-5">{{ currentQuestion.answer_d }}</span>
                    </label>
                </div>
            </div>

            <div class="flex justify-end mt-8 mx-4">
                <SecondaryButton v-if="questionIndex + 1 < count" @click="nextQuestion">Next</SecondaryButton>
                <SecondaryButton v-else @click="submit">Submit</SecondaryButton>
            </div>
        </BodyCard>
    </AuthenticatedLayout>
</template>


<style scoped>

</style>
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import BodyCard from "@/Components/BodyCard.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import {computed, onBeforeUnmount, onMounted, ref, watch} from "vue";
import {useForm} from "@inertiajs/vue3";

let props = defineProps({
    'title' : String,
    'questions' : Array,
    'count' : Number,
    'id' : Number
})

let questionIndex = ref(0)
let currentQuestion = computed(() => {
    return props.questions[questionIndex.value]
})

let nextQuestion = () => {
    if (questionIndex.value + 1 < props.questions.length){
        questionIndex.value++
        timeLeft.value = 45
    }
}
/*let previousQuestion = () => {
    if (questionIndex.value > 0){
        questionIndex.value--
    }
}*/
let form = useForm({
    'answer' : [],
})

let submit = () => {
    form.post(route('quiz.submit', props.id))
}

let timeLeft = ref(45);
let intervalId = null;

const startTimer = () => {
    intervalId = setInterval(() => {
        if (timeLeft.value > 0) {
            timeLeft.value--;
        } else {
            nextQuestion()
            startTimer()
            clearInterval(intervalId);
        }
    }, 1000);
};

onMounted(() => {
    startTimer();
});

onBeforeUnmount(() => {
    if (intervalId) {
        clearInterval(intervalId);
    }
});
</script>
