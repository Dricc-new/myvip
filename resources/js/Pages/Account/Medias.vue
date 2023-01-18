<script setup>
    import ProfileLayout from '@/Layouts/Profile.vue';
import { Link } from '@inertiajs/inertia-vue3';
    const props = defineProps({
        idUser: String,
        isUser: Boolean,
    });
</script>
<template>
    <ProfileLayout :isUser="props.isUser">
        <Link class="w-full text-center m-1 border-b border-c1 isHover" :href="route('profile.posts',{id:props.idUser})"><h1 class="txt-c1 text-xl">Posts</h1></Link>
        <div class="w-full border-c1 isHover focusItem text-center m-1" ><h1 class="txt-c1 text-xl">Medios</h1></div>
        <div class="col-span-2 bg-color-primary-2 rounded w-full p-4 text-xl txt-c1">

        </div>
    </ProfileLayout>
</template>