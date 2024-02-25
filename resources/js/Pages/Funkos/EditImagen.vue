<script setup>
import { ref } from 'vue';
import AppLayout from "@/Layouts/AppLayout.vue";
import { PhotoIcon } from '@heroicons/vue/20/solid';
import { Inertia } from "@inertiajs/inertia";

// Define las props y una ref para el archivo seleccionado
const { funko } = defineProps({
    funko: {
        type: Object,
        required: true
    }
});

const selectedFile = ref(null);

const handleDragOver = (e) => {
    e.preventDefault(); // Evita que se abra la imagen en el navegador
};

const handleDrop = (e) => {
    e.preventDefault();
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        selectedFile.value = files[0];
        // Opcional: Aquí podrías actualizar la vista previa de la imagen si lo deseas
    }
};

const handleFileChange = (e) => {
    if (e.target.files.length > 0) {
        selectedFile.value = e.target.files[0];
    }
};

const submitFile = () => {
    if (selectedFile.value) {
        const formData = new FormData();
        formData.append('imagen', selectedFile.value);

        Inertia.post(route('funkos.updateImagen', { id: funko.id }), formData, {
            // Opciones adicionales como el manejo de la barra de progreso, etc.
        });
    }
};
</script>


<template>
    <AppLayout title="Editar Imagen">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar Imagen
            </h2>
        </template>
        <div class="py-12">
            <div class="relative max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200 background-size">
                    <div class="justify-between">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-base font-semibold leading-7 text-gray-900">Imagen:</h3>
                            <img :src="funko.imagen" alt="Funko" class="h-64 w-64 rounded-lg object-cover"/>
                            <div class="col-span-full">
                                <label for="cover-photo" class="block text-xl font-medium leading-6 text-gray-900">Actualizar
                                    foto</label>
                                <div @dragover.prevent="handleDragOver" @drop.prevent="handleDrop"
                                     class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                    <div class="text-center">
                                        <PhotoIcon class="mx-auto h-12 w-12 text-gray-300" aria-hidden="true"/>
                                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                            <label for="file-upload"
                                                   class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                <span>Subir un archivo</span>
                                                <input id="file-upload" accept="image/*" name="file-upload" type="file"
                                                       class="sr-only" @change="handleFileChange" />

                                            </label>
                                            <p class="pl-1">o arrastrar y soltar</p>
                                        </div>
                                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF hasta 10MB</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-full">
                                <button @click="submitFile"
                                        class="mt-4 w-full inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
