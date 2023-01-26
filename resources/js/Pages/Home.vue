<script setup>
import AppLayout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Home"/>
    <AppLayout sidebarRight="true">
        <div class="text-center text-2xl txt-c1">
            <img src="/img/no-content-available.svg" alt="">
            <h1>No hay publicaciones disponibles</h1>
        </div>
    </AppLayout>
    
</template>