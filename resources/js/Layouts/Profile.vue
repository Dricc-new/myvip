<script setup>
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import AppLayout from '@/Layouts/Layout.vue';

    const props = defineProps({
        isUser: Boolean,
    });

</script>

<template>
    <Head :title="title" />
    <AppLayout sidebarRight="true">
        <div class="h-64 overflow-hidden flex items-center relative">
            <img src="/img/default-cover.png" class=" w-full z-10" alt="">
        </div>
        <img src="/img/default-avatar.jpg" class="inline-block rounded-full w-32 h-32 z-10 relative left-5 bottom-16" alt="">
        <div v-if="isUser " class="float-right inline-block m-2 text-center w-10 z-20" >
            <Link :href="route('settings.theme')">
                <i class="fa fa-share-alt text-2xl txt-c1"></i>
            </Link>
        </div>
        <div v-if="isUser " class="float-right inline-block m-2 text-center w-10 z-20" >
            <Link :href="route('settings.theme')">
                <i class="fa fa-cog text-2xl txt-c1"></i>
            </Link>
        </div>
        <main class="grid grid-cols-2 justify-items-center">
            <slot/>
        </main>
    </AppLayout>
</template>