<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import AppLayout from '@/Layouts/Layout.vue';
</script>

<template>
    <Head title="Notifications"/>
    <AppLayout>
        <nav>
            <ul class="grid grid-cols-4 text-center txt-c1">
                <li class="p-3 border-c1 isHover focusItem"><Link><h1 class="font-bold"><i class="mx-2 fa fa-list-ul"></i> All</h1></Link></li>
                <li class="p-3 border-b border-c1 isHover"> <Link><h1 class="font-bold"><i class="mx-2 fa fa-comments"></i>Messages</h1></Link></li>
                <li class="p-3 border-b border-c1 isHover"> <Link><h1 class="font-bold"><i class="mx-2 fa fa-heart"></i>Subscriptions</h1></Link></li>
                <li class="p-3 border-b border-c1 isHover"> <Link><h1 class="font-bold"><i class="mx-2 fa fa-gift"></i>Tips</h1></Link></li>
            </ul>
        </nav>
    </AppLayout>
</template>