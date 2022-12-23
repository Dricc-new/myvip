<script setup>
    import { useForm,Head } from '@inertiajs/inertia-vue3';
    import SettingsLayout from '@/Layouts/Settings.vue';
</script>

<template>
    <Head title="Settings-Theme"></Head>
    <SettingsLayout>
        <form @submit.prevent="submit">
            
            <div class=" m-2 border border-c1  rounded">
                <h1 class="m-2 txt-c1 text-3xl col-span-3">App Style</h1>
                <div class="grid grid-cols-3 ">
                    <div class="grid grid-cols-2 m-2 border border-c1 rounded inline-block">
                        <h1 class=" m-2 txt-c1 text-xl col-span-2">Text Color</h1>

                        <div class="m-2 grid grid-cols-2 place-items-center">
                            <h1 class="txt-c1 inline">Primary</h1>
                            <input class=" border-0" type="color" name="sidebar-border-color-1" id="sidebar-border-color-1">
                        </div>
                        <div class="m-2 grid grid-cols-2 place-items-center">
                            <h1 class="txt-c1 inline">Secundary</h1>
                            <input class=" border-0" type="color" name="sidebar-border-color-1" id="sidebar-border-color-1">
                        </div>

                    </div>
                    <div class="grid grid-cols-2 m-2 border border-c1 rounded inline-block">
                        <h1 class=" m-2 txt-c1 text-xl col-span-2">Border Color</h1>

                        <div class="m-2 grid grid-cols-2 place-items-center">
                            <h1 class="txt-c1 inline">Primary</h1>
                            <input class=" border-0" type="color" name="sidebar-border-color-1" id="sidebar-border-color-1">
                        </div>
                        <div class="m-2 grid grid-cols-2 place-items-center">
                            <h1 class="txt-c1 inline">Secundary</h1>
                            <input class=" border-0" type="color" name="sidebar-border-color-1" id="sidebar-border-color-1">
                        </div>

                    </div>
                    <div class="grid grid-cols-2 m-2 border border-c1 rounded inline-block">
                        <h1 class=" m-2 txt-c1 text-xl col-span-2">Background Color</h1>

                        <div class="m-2 grid grid-cols-2 place-items-center">
                            <h1 class="txt-c1 inline">Primary</h1>
                            <input class=" border-0" type="color" name="sidebar-border-color-1" id="sidebar-border-color-1">
                        </div>
                        <div class="m-2 grid grid-cols-2 place-items-center">
                            <h1 class="txt-c1 inline">Secundary</h1>
                            <input class=" border-0" type="color" name="sidebar-border-color-1" id="sidebar-border-color-1">
                        </div>

                    </div>
                    
                    <div class="grid grid-cols-2 m-2 border border-c1 rounded inline-block">
                        <h1 class=" m-2 txt-c1 text-xl col-span-2">Border Style</h1>

                        <div class="m-2 grid grid-cols-2 place-items-center">
                            <h1 class="txt-c1 inline">Size</h1>
                            <input class="border border-c1 w-20 h-8" type="number" name="sidebar-border-color-1" id="sidebar-border-color-1">
                        </div>
                        <div class="m-2 grid grid-cols-2 place-items-center">
                            <h1 class="txt-c1 inline">Radius</h1>
                            <input class="border border-c1 w-20 h-8" type="number" name="sidebar-border-color-1" id="sidebar-border-color-1">
                        </div>

                    </div>
                </div>
            
                <div class=" m-2 border border-c1 grid grid-cols-3 rounded">
                    <h1 class="m-2 txt-c1 text-2xl col-span-3">Sidebar Style</h1>
                    <div class="grid grid-cols-2 m-2 border border-c1 rounded inline-block">
                        <h1 class=" m-2 txt-c1 text-xl col-span-2">Sidebar Text Color</h1>

                        <div class="m-2 grid grid-cols-2 place-items-center">
                            <h1 class="txt-c1 inline">Primary</h1>
                            <input class=" border-0" type="color" name="sidebar-border-color-1" id="sidebar-border-color-1">
                        </div>
                        <div class="m-2 grid grid-cols-2 place-items-center">
                            <h1 class="txt-c1 inline">Secundary</h1>
                            <input class=" border-0" type="color" name="sidebar-border-color-1" id="sidebar-border-color-1">
                        </div>

                    </div>
                    <div class="grid grid-cols-2 m-2 border border-c1 rounded inline-block">
                        <h1 class=" m-2 txt-c1 text-xl col-span-2">Sidebar Border Color</h1>

                        <div class="m-2 grid grid-cols-2 place-items-center">
                            <h1 class="txt-c1 inline">Primary</h1>
                            <input class=" border-0" type="color" name="sidebar-border-color-1" id="sidebar-border-color-1">
                        </div>
                        <div class="m-2 grid grid-cols-2 place-items-center">
                            <h1 class="txt-c1 inline">Secundary</h1>
                            <input class=" border-0" type="color" name="sidebar-border-color-1" id="sidebar-border-color-1">
                        </div>

                    </div>
                    <div class="grid grid-cols-2 m-2 border border-c1 rounded inline-block">
                        <h1 class=" m-2 txt-c1 text-xl col-span-2">Sidebar Background Color</h1>

                        <div class="m-2 grid grid-cols-2 place-items-center">
                            <h1 class="txt-c1 inline">Primary</h1>
                            <input class=" border-0" type="color" name="sidebar-border-color-1" id="sidebar-border-color-1">
                        </div>
                        <div class="m-2 grid grid-cols-2 place-items-center">
                            <h1 class="txt-c1 inline">Secundary</h1>
                            <input class=" border-0" type="color" name="sidebar-border-color-1" id="sidebar-border-color-1">
                        </div>

                    </div>
                </div>
            </div>
        </form>
    
    </SettingsLayout>
</template>