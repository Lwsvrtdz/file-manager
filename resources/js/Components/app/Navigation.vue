<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from '../ApplicationLogo.vue';
import CreateNewDropdown from './CreateNewDropdown.vue';
import NavLink from '../NavLink.vue';

</script>

<template>
    <nav class="min-w-[200px]">
        <Link :href="route('my-files')" class="h-[80px] px-3 flex items-center gap-3">
            <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800" />
            Larastorage
        </Link>
        <div class="px-3">
            <CreateNewDropdown />

            <div class="py-3">
                <NavLink :href="route('my-files')" :active="$page.url === '/my-files'" > My Files </NavLink>
                <NavLink href=""> Shared with Me </NavLink>
                <NavLink href=""> Shared by me </NavLink    >
                <NavLink href=""> Trash </NavLink>
                <NavLink href=""> Settings </NavLink>
            </div>
        </div>
    </nav>
</template>
