<script lang="ts" setup>
import { useForm } from '@inertiajs/vue3';
import InputLabel from '../InputLabel.vue';
import Modal from '../Modal.vue';
import TextInput from '../TextInput.vue';


const {modelValue} = defineProps({
    modelValue: Boolean
})

type ErrorData = {
    name: string
}
type FormData = {
    name: string,
    errors: ErrorData
}

const form = useForm<FormData>({
    name: '',
    errors: {
        name: '',
    }
})

const createFolder = () => {
}

</script>

<template>
    <Modal :show="modelValue">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Create New Folder
            </h2>
            <div class="mt-6">
                <InputLabel for="folderName" value="Folder Name" />
                <TextInput 
                    type="text" 
                    id="folderName"
                    v-model="form.name"
                    class="mt-1 block w-full"
                    :class="form.errors.name ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : ''"
                    placeholder="Folder Name"
                    required
                    autofocus
                    autocomplete="folderName"
                    @keyup.enter="createFolder"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>
        </div>
    </modal>

</template>