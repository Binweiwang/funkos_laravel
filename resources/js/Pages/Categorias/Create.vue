<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import AppLayout from "@/Layouts/AppLayout.vue";
import CategoriaForm from "@/Components/categorias/Form.vue";
const form = useForm({
    nombre: ''
})
</script>

<template>
    <AppLayout title="Crear Categoria">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear Categoria
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="justify-between">
                       <CategoriaForm :form="form" @submit="form.post(route('categorias.store'))"></CategoriaForm>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
