<script setup lang="ts">
import ProfileController from '@/actions/App/Http/Controllers/Settings/ProfileController';
import { edit } from '@/routes/profile';
import { send } from '@/routes/verification';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';

import DeleteUser from '@/components/DeleteUser.vue';
import HeadingSmall from '@/components/HeadingSmall.vue';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/AppLayout.vue';
import SettingsLayout from '@/layouts/settings/Layout.vue';
import { type BreadcrumbItem } from '@/types';
import EventTypeController from '@/actions/App/Http/Controllers/EventTypeController';

interface Props {
    mustVerifyEmail: boolean;
    status?: string;
    eventTypes?: [];
    channels?: [];
}

defineProps<Props>();

const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: 'Profile settings',
        href: edit().url,
    },
];

const page = usePage();
const user = page.props.auth.user;

const userForm = useForm({
    name: user.name,
    email: user.email,
    event_types: [],
    channels: user?.preferredChannels,
});

const submit = () => {
    userForm.submit(ProfileController.update());
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">
        <Head title="Profile settings" />

        <SettingsLayout>
            <div class="flex flex-col space-y-6">
                <HeadingSmall
                    title="Profile information"
                    description="Update your name and email address"
                />

                <form @submit.prevent="submit" class="space-y-6">
                    <div class="grid gap-2">
                        <Label for="name">Name</Label>
                        <Input
                            id="name"
                            class="mt-1 block w-full"
                            name="name"
                            v-model="userForm.name"
                            required
                            autocomplete="name"
                            placeholder="Full name"
                        />
                        <InputError
                            class="mt-2"
                            :message="userForm.errors.name"
                        />
                    </div>

                    <div class="grid gap-2">
                        <Label for="email">Email address</Label>
                        <Input
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            name="email"
                            v-model="userForm.email"
                            :default-value="user.email"
                            required
                            autocomplete="username"
                            placeholder="Email address"
                        />
                        <InputError
                            class="mt-2"
                            :message="userForm.errors.email"
                        />
                    </div>

                    <div v-if="mustVerifyEmail && !user.email_verified_at">
                        <p class="-mt-4 text-sm text-muted-foreground">
                            Your email address is unverified.
                            <Link
                                :href="send()"
                                as="button"
                                class="text-foreground underline decoration-neutral-300 underline-offset-4 transition-colors duration-300 ease-out hover:decoration-current! dark:decoration-neutral-500"
                            >
                                Click here to resend the verification email.
                            </Link>
                        </p>

                        <div
                            v-if="status === 'verification-link-sent'"
                            class="mt-2 text-sm font-medium text-green-600"
                        >
                            A new verification link has been sent to your email
                            address.
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <Label for="eventTypes">Preferred Channels</Label>
                        <div class="flex" v-for="channel in channels" :key="channel.id">
                            <input
                                type="checkbox"
                                v-model="userForm.channels"
                                class="mt-1 h-5 w-5 rounded border-gray-300 text-neutral-600 focus:ring-neutral-500"
                                name="channel"
                                :value="channel?.id"/>
                            <Label for="channel" class="px-2">
                                {{ channel?.name }}
                            </Label>
                        </div>
                        <InputError
                            class="mt-2"
                            :message="userForm.errors.channels" />
                    </div>

                    <div class="flex items-center gap-4">
                        <Button
                            :disabled="userForm.processing"
                            data-test="update-profile-button">
                            Save
                        </Button>

                        <Transition
                            enter-active-class="transition ease-in-out"
                            enter-from-class="opacity-0"
                            leave-active-class="transition ease-in-out"
                            leave-to-class="opacity-0"
                        >
                            <p
                                v-show="userForm.recentlySuccessful"
                                class="text-sm text-neutral-600"
                            >
                                Saved.
                            </p>
                        </Transition>
                    </div>
                </form>
            </div>

            <div class="border border-neutral-200 rounded-md p-4 mt-6">
                <h3 class="font-bold">Preferred Channels</h3>
<!--                <div class="flex flex-col gap-2" v-for="eventType in eventTypes" :key="eventType.id">-->
<!--                    <Label for="eventTypes">-->
<!--                        {{ eventType.name }}-->
<!--                    </Label>-->
<!--                </div>-->

                <div class="flex flex-col gap-2" v-for="channel in channels" :key="channel.id">
                    <Link :href="EventTypeController.create(channel.id)" class="hover:underline p-2">
                        {{ channel.name }}
                    </Link>
                </div>
            </div>

        </SettingsLayout>
    </AppLayout>
</template>
