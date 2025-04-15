<script lang="ts" setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../TextInput.vue';

type FormData = {
    search: string
}
const form = useForm<FormData>({
    search: ''
})

</script>

<template>
   <div class="w-[600px] h-[80px] flex items-center">
        <TextInput type="text"
                   class="block w-full mr-2"
                   v-model="form.search"
                   autocomplete
                   placeholder="Search for files and folders"/>
    </div>
</template>