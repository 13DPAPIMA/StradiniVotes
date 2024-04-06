<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Balsošanas" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Balsošanas</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">Balsošanu sarakstam jābūt zemāk </div>
                </div>
            </div>
        </div>

   <div>
   {{$page.props.auth.user}}
   </div>
   
   <div>
   {{ route('votes.create') }} 
   </div>
        <a
        v-if="$page.props.auth.user.role === 'admin'"
        :href="route('votes.create')"
        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
    >
        Izveidot balsošanu
        </a>

    </AuthenticatedLayout>
</template>
