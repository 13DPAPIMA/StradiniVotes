<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps(['votes', 'voteOptions']);
console.log('vOTES:', props.votes);
console.log('Votes Options:', props.voteOptions);

const getVoteOptions = (voteId) => {
    return props.voteOptions.filter(option => option.vote_id === voteId); 
};

const voteForOption = (optionId) => {
    console.log('Голосование за опцию с ID:', optionId);
};
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
                    <div class="p-6 text-gray-900 dark:text-gray-100">Balsošanu sarakstam jābūt zemāk ▼
                        <p>
                           {{$page.props.auth.user.name }} , noklišķiniet pogu zemāk , lai turpinātu.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100"> 
                        <div>
                            <h1>Balsošanas saraksts</h1>
                            <ul v-if="voteOptions !== undefined"> 
                                <li v-for="vote in $page.props.votes" :key="vote.id">
                                    <h2>Nosaukums: {{ vote.title }}</h2>
                                    <p>Aprsksts: {{ vote.description }}</p>
                                    <p>Izveidoja: {{ vote.creator }}</p>
                                    <ul v-if="getVoteOptions(vote.id).length > 0">
                                        <li v-for="option in getVoteOptions(vote.id)" :key="option.id">
                                            <br> <p>Kandidāts {{ option.name }}  <button class="relative inline cursor-pointer text-xl font-medium before:bg-violet-600  before:absolute before:-bottom-1 before:block before:h-[2px] before:w-full before:origin-bottom-right before:scale-x-0 before:transition before:duration-300 before:ease-in-out hover:before:origin-bottom-left hover:before:scale-x-100"@click="voteForOption(option.id)">Nobalsot</button></p>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                          </div>
                   
                    </div>
                </div>
            </div>
        </div>
        
        <div class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            
        </div>
        
        <div>
            
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
