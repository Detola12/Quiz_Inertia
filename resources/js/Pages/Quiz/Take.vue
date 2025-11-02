<template>
    <AuthenticatedLayout>
        <template #header>
            <PageHeader>Take Quiz -- {{ props.title }}</PageHeader>
        </template>

        <BodyCard class="container mx-auto">
            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                <div class="bg-blue-600 h-2.5 rounded-full" :style="{ width: progress + '%' }"></div>
            </div>

            <div class="my-6">
                <h4 class="text-3xl font-semibold">{{ currentQuestion.text }}</h4>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div
                    v-for="option in ['a', 'b', 'c', 'd']"
                    :key="option"
                    @click="selectAnswer(option)"
                    :class="['p-4 border rounded-lg cursor-pointer transition-colors', { 'bg-blue-200': form.answer[questionIndex] && form.answer[questionIndex][1] === option }]"
                >
                    <label :for="'option-' + option" class="text-sm text-gray-800 ms-2">
                        <input
                            type="radio"
                            :id="'option-' + option"
                            v-model="form.answer[questionIndex]"
                            :value="[currentQuestion.id, option]"
                            name="hs-radio-vertical-group"
                            class="shrink-0 mt-0.5 border-gray-500 rounded-full text-gray-700 focus:ring-gray-600 disabled:opacity-50 disabled:pointer-events-none"
                        >
                        <span class="ms-5">{{ currentQuestion['answer_' + option] }}</span>
                    </label>
                </div>
            </div>

            <div class="flex justify-between mt-8 mx-4">
                <SecondaryButton :disabled="questionIndex < 1" @click="previousQuestion">Prev</SecondaryButton>
                <div>
                    <SecondaryButton v-if="questionIndex + 1 < count" @click="nextQuestion">Next</SecondaryButton>
                    <SecondaryButton v-else @click="submit">Submit</SecondaryButton>
                </div>
            </div>
        </BodyCard>
    </AuthenticatedLayout>
</template>


<style scoped>
    .questions_tab {
        position: absolute;
        left: 25px;
    }

    .question_pop{
        background-color: #000000;
        width: 30px;
        height: 30px;
        border-radius: 100%;
        padding-top: 2px;
        color: white;
        text-align: center;
    }
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

const progress = computed(() => {
    return ((questionIndex.value + 1) / props.count) * 100
})

const selectAnswer = (option) => {
    form.answer[questionIndex.value] = [currentQuestion.value.id, option]
}

let nextQuestion = () => {
    if (questionIndex.value + 1 < props.questions.length){
        questionIndex.value++
        timeLeft.value = 45
    }
}
let previousQuestion = () => {
    if (questionIndex.value > 0){
        questionIndex.value--
    }
}
let form = useForm({
    'answer' : [],
})

let submit = () => {
    form.post(route('quiz.submit', props.id))
}

let timeLeft = ref(45);
let intervalId = null;

/*const startTimer = () => {
    intervalId = setInterval(() => {
        if (timeLeft.value > 0) {
            timeLeft.value--;
        } else {
            nextQuestion()
            startTimer()
            clearInterval(intervalId);
        }
    }, 1000);
};*/

onMounted(() => {
    startTimer();
});

onBeforeUnmount(() => {
    if (intervalId) {
        clearInterval(intervalId);
    }
});
</script>
