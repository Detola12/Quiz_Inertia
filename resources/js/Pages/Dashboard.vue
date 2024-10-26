<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import SecondaryButton from "@/Components/SecondaryButton.vue";
import CustomLink from "@/Components/CustomLink.vue";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
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
                                    <h3 class="text-base font-semibold leading-7 text-gray-900">User Information</h3>
                                    <p class="max-w-2xl mt-1 text-sm leading-6 text-gray-500">Personal details and application.</p>
                                </div>
                                <div class="">
                                    <Link :href="route('profile.edit')"
                                          class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 border border-transparent rounded-md hover:bg-gray-700">
                                        Edit Profile
                                    </Link>
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
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">Admin</dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Email address</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $attrs.auth.user.email }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <section class="space-y-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex p-6 justify-between overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div>
                    <h2 class="text-lg font-medium text-gray-900">
                        Set Question
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        Add to the collection of questions
                    </p>
                </div>
                <div>
                    <CustomLink :href="route('question.create')">Set Question</CustomLink>
                </div>
            </div>
            <div class="flex p-6 justify-between overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div>
                    <h2 class="text-lg font-medium text-gray-900">
                        Set Section
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        Add to the collection of sections
                    </p>
                </div>
                <div>
                    <CustomLink :href="route('section.create')">Set Section</CustomLink>
                </div>
            </div>
            <div class="flex p-6 justify-between overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div>
                    <h2 class="text-lg font-medium text-gray-900">
                        Set a quiz
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        Add to the collection of sections
                    </p>
                </div>
                <div>
                    <CustomLink :href="route('quiz.create')">Set Quiz</CustomLink>
                </div>
            </div>

        </section>
    </AuthenticatedLayout>
</template>
