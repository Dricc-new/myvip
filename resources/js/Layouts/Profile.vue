<script setup>
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import AppLayout from '@/Layouts/Layout.vue';

    const props = defineProps({
        isUser: Boolean,
    });

</script>

<template>
    <Head title="Profile" />
    <AppLayout>
        <div class="h-64 rounded m-3 border-shadow-c1 overflow-hidden flex items-center relative">
            <img src="/img/default-cover.png" class=" w-full z-10" alt="">
            <div class="rounded h-24 w-24 text-center z-20 absolute top-0">
                <i class="fa fa-user-alt text-7xl txt-c1 p-1 py-5"></i>
            </div>
            <div v-if="isUser " class="absolute bottom-0 right-0 m-2 text-center w-10 z-20" >
                <Link :href="route('settings.theme')">
                    <i class="fa fa-cog text-2xl txt-c1"></i>
                </Link>
            </div>  
        </div>
        <main class=" grid grid-cols-3 justify-items-center m-3">
            <slot/>
        </main>


    </AppLayout>
</template>