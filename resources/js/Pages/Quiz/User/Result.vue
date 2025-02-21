<template>
    <Head title="Results" />

    <AuthenticatedLayout :permission="$attrs.can">
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div>
                        <div class="container px-6 mt-4">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="text-base font-semibold leading-7 text-gray-900">User Result Details</h3>
                                    <p class="max-w-2xl mt-1 text-sm leading-6 text-gray-500"></p>
                                </div>
                            </div>
                            <div class="mt-6 border-t border-gray-100">
                                <dl class="divide-y divide-gray-100">
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Full name</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $attrs.auth.user.name }}</dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Role</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $attrs.auth.role }}</dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Email address</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $attrs.auth.user.email }}</dd>
                                    </div>
                                </dl>
                            </div>
                            <div class="my-8 flex">
                                <div class="mb-4">
                                    <table class="w-full border">
                                        <thead>
                                        <tr>
                                            <th class=" px-6 py-3 text-left">
                                                <span class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Quiz</span>
                                            </th>
                                            <th class=" px-6 w-[30px] py-3 text-left">
                                                <span class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Questions</span>
                                            </th>
                                            <th class=" px-6 w-[30px] py-3 text-left">
                                                <span class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Answered</span>
                                            </th>
                                            <th class=" px-6 w-[30px] py-3 text-left">
                                                <span class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Score</span>
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                        <tr v-for="result in user_result" class="bg-white">
                                            <td class="px-6  py-4 text-sm leading-5 text-gray-600 uppercase whitespace-no-wrap">
                                                {{ result.quiz.name }}
                                            </td>
                                            <td class="px-6 text-center py-4 text-sm leading-5 text-gray-600 uppercase whitespace-no-wrap ">
                                                {{ result.quiz.question_count }}
                                            </td>
                                            <td class="px-6 text-center py-4 text-sm leading-5 text-gray-600 uppercase whitespace-no-wrap ">
                                                {{ result.question_answered }}
                                            </td>
                                            <td class="px-6 text-center font-bold py-4 text-sm leading-5 text-gray-600 uppercase whitespace-no-wrap ">
                                                {{ result.score }}
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                    <div class="mt-4">
                                        <!--                    {{ $questions->links() }}-->

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps({
    'user_result' : Array
})
</script>

<style scoped>

</style>
