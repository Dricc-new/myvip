<script setup>
    import AppLayout from '@/Layouts/Layout.vue';
</script>

<template>
    <AppLayout>
        <nav>
            <ul class="m-2 txt-1">
                <li class="inline-block w-32 border-br rounded-br text-center border-c1">
                    <i class="mx-1 fa fa-palette"></i> 
                    <h1 class="mx-1 inline-block">Theme</h1>
                </li>
                <li class="inline-block w-32 border-br rounded-br text-center border-c1">
                    <i class="mx-1 fa fa-palette"></i> 
                    <h1 class="mx-1 inline-block">Theme</h1>
                </li>
            </ul>
        </nav>
        <main class="my-6">
            <slot />
        </main>
    </AppLayout>
</template>