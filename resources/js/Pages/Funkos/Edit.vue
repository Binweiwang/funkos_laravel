<script>
export default {
    name: 'CategoriaEdit'
}
</script>
<script setup>
import {useForm} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import FunkoForm from "@/Components/funkos/Form.vue";

const props = defineProps({
    categorias: {
        type: Object,
        required: true
    }
    ,
    funko: {
        type: Object,
        required: false
    }
})
const form = useForm({
    nombre: props.funko.nombre,
    descripcion: props.funko.descripcion,
    precio: props.funko.precio,
    cantidad: props.funko.cantidad,
    categoria_id: props.funko.categoria_id

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
                        <FunkoForm :updating="true" :categorias="categorias" :form="form" @submit="form.put(route('funkos.update',funko.id))"></FunkoForm>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
