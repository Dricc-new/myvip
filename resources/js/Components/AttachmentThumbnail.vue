<template>
    <div class="rounded-lg w-24 h-24 p-5 bg-slate-800" v-if="(type=='image/png')">
        <font-awesome-icon icon="fa-brands fa-twitter" />
        <img :src="src" >
    </div>
</template>

<script setup>
    defineProps({
        src: '',
        type: '',
});
</script>