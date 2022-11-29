<script setup>
import { useForm,Head } from '@inertiajs/inertia-vue3'

    defineProps({
        placeholder: String,
    });

    const form = useForm({
      list: File,
    })

    var source = new String;

    function submit() {
      form.post(route('post.createpost'),{
            forceFormData: true,
        });
    }

    function loadFiles(files){
        let data = files.target.files;
        form.list = data[0];
        console.log(data);
        console.log(form.list);
        renderFiles(data);
    }

    function renderFiles(data){
        let reader = new FileReader();

        reader.onload = (temp) => {
            source = temp.target.result;
        }
        reader.readAsDataURL(data[0]);
    }

    function thumbnail(){
        return source;
    }

</script><!-- 
<script setup>


</script> -->

<template>
    <Head title="Create Post" />
    <div class="rounded-md border-2 border-gray-800 w-auto h-48" id="box-files">
        <img :src="thumbnail" class="rounded-md w-64 h-64"/>
    </div>
    <div>
        <form @submit.prevent="submit" enctype="multipart/form-data">
            <textarea name="" id="" cols="30" rows="10" :placeholder="placeholder"></textarea>
            <input type="file" @change="loadFiles"/>
            <progress class="rounded-md border-2 h-5" v-if="form.progress" :value="form.progress.percentage" max="100">
            {{ form.progress.percentage }}%
            </progress>
            <button class="rounded-md border-2 border-gray-800 px-5 py-1" type="submit">Submit</button>
        </form>
    </div>
</template>

