<script setup lang="ts">
import EventTypeController from '@/actions/App/Http/Controllers/EventTypeController';
import HeadingSmall from '@/components/HeadingSmall.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import SettingsLayout from '@/layouts/settings/Layout.vue';
import { edit } from '@/routes/appearance';
import type { BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';

const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: 'Event type settings',
        href: edit().url,
    },
];

const props = defineProps<{
    eventTypes: object;
    channelPivotId: number;
    channelPivot: string;
}>();

const eventTypeForm = useForm({
    channelPivotId: props.channelPivotId,
    eventTypes: [],
});

const submit = () => {
    eventTypeForm.submit(EventTypeController.update(props.channelPivotId));
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">
        <Head title="Event Type settings" />

        <SettingsLayout>
            <div class="space-y-6">
                <HeadingSmall
                    title="Event Type settings"
                    description="Update your account's Event Type settings"
                />
                <p>Channel: {{ channelPivot }}</p>
                <div>
                    <form
                        @submit.prevent="submit"
                        class="space-y-6"
                        v-if="eventTypes"
                    >
                        eventTypeForm: {{ eventTypeForm }}
                        <ul
                            class="flex flex-col gap-2"
                            v-for="(eventType, index) in eventTypes"
                            :key="index"
                        >
                            <li class="flex items-center gap-2">
                                <input
                                    type="checkbox"
                                    v-model="eventTypeForm.eventTypes"
                                    :value="eventType.id"
                                    class="mt-1 h-5 w-5 rounded border-gray-300 text-neutral-600 focus:ring-neutral-500"
                                />
                                <h2>{{ eventType.name }}</h2>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </SettingsLayout>
    </AppLayout>
</template>
