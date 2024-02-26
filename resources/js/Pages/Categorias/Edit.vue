<script>
export default {
    name: 'CategoriaEdit'
}
</script>
<script setup>
import {useForm} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import CategoriaForm from "@/Components/categorias/Form.vue";

const props = defineProps({
    categoria: {
        type: Object,
        required: true
    }
})
const form = useForm({
    nombre: props.categoria.nombre
})
</script>

<template>
    <AppLayout title="Editar Categoria">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar Categoria
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="justify-between">
                        <CategoriaForm :updating="true" :form="form" @submit="form.put(route('categorias.update',categoria.id))"></CategoriaForm>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
