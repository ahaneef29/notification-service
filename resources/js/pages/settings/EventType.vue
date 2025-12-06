<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import HeadingSmall from '@/components/HeadingSmall.vue';
import { type BreadcrumbItem } from '@/types';

import AppLayout from '@/layouts/AppLayout.vue';
import SettingsLayout from '@/layouts/settings/Layout.vue';
import { edit } from '@/routes/appearance';

const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: 'Event type settings',
        href: edit().url,
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">
        <Head title="Event Type settings" />

        <SettingsLayout>
            <div class="space-y-6">
                <HeadingSmall
                    title="Event Type settings"
                    description="Update your account's Event Type settings" />

                sssss

            </div>
        </SettingsLayout>
    </AppLayout>
</template>
