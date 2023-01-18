<script setup>
import AppLayout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Home"/>
    <AppLayout>
        <aside class="sidebar sidebar-right">
            <nav>
                <h1>
                    <div class="m-3 pl-1 fa fa-search"></div>
                    <input type="text" class="m-2 w-48 h-8 rounded focus:border-none" placeholder="Search..." name="" id="">
                </h1>
            </nav>
            <div class="propuestas">
                <h1 class="m-3 text-xl">Propuestas</h1>
                <div class="fixed right-0 top-16 m-3">
                    <i class="inline-block fa fa-tag"></i>
                    <i class="inline-block fa fa-refresh"></i>
                </div>
            </div>
            
        </aside>
        <div class=" mr-72">
            <div class="text-center text-2xl txt-c1">
                <img src="/img/no-content-available.svg" alt="">
                <h1>No hay publicaciones disponibles</h1>
            </div>
        </div>
    </AppLayout>
    
</template>