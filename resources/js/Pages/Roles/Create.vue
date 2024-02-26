<script setup>
import {useForm} from '@inertiajs/inertia-vue3'
import AppLayout from "@/Layouts/AppLayout.vue";
import RoleForm from "@/Components/roles/Form.vue";

const form = useForm({
    name: '',
    email: '',
    password: '',
    role: ''
})
defineProps({
    roles: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <AppLayout title="Crear Categoria">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear Usuario
            </h2>
            {{ roles}}
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="justify-between">
                        <RoleForm :form="form" :roles="roles" @submit="form.post(route('roles.store'))"></RoleForm>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
