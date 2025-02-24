{{--
<COPYRIGHT>

    Copyright © 2016-2025, Canyon GBS LLC. All rights reserved.

    Advising App™ is licensed under the Elastic License 2.0. For more details,
    see https://github.com/canyongbs/advisingapp/blob/main/LICENSE.

    Notice:

    - You may not provide the software to third parties as a hosted or managed
      service, where the service provides users with access to any substantial set of
      the features or functionality of the software.
    - You may not move, change, disable, or circumvent the license key functionality
      in the software, and you may not remove or obscure any functionality in the
      software that is protected by the license key.
    - You may not alter, remove, or obscure any licensing, copyright, or other notices
      of the licensor in the software. Any use of the licensor’s trademarks is subject
      to applicable law.
    - Canyon GBS LLC respects the intellectual property rights of others and expects the
      same in return. Canyon GBS™ and Advising App™ are registered trademarks of
      Canyon GBS LLC, and we are committed to enforcing and protecting our trademarks
      vigorously.
    - The software solution, including services, infrastructure, and code, is offered as a
      Software as a Service (SaaS) by Canyon GBS LLC.
    - Use of this software implies agreement to the license terms and conditions as stated
      in the Elastic License 2.0.

    For more information or inquiries please visit our website at
    https://www.canyongbs.com or contact us via email at legal@canyongbs.com.

</COPYRIGHT>
--}}
@php
    use Filament\Support\Enums\ActionSize;
@endphp

<div class="h-[calc(100dvh-4rem)]">
    @if ($this->isConsented && $this->thread)
        @capture($sidebarContent, $assistantSwitcherForm)
            <div class="flex select-none flex-col gap-y-2">
                <div
                    class="relative"
                    x-data="{ isSearchingAssistants: false }"
                >
                    <div class="flex flex-col gap-2">
                        <div class="grid w-full grid-cols-2 gap-2">
                            <x-filament::button
                                icon="heroicon-m-plus"
                                wire:click="createThread"
                            >
                                New Chat
                            </x-filament::button>

                            {{ $this->newFolderAction }}
                        </div>

                        @if ($this->customAssistants)
                            <x-filament::button
                                color="gray"
                                icon="heroicon-m-magnifying-glass"
                                x-on:click="isSearchingAssistants = ! isSearchingAssistants"
                            >
                                Use Custom Assistant
                            </x-filament::button>
                        @endif
                    </div>

                    @if ($this->customAssistants)
                        <div
                            class="absolute right-0 z-10 mt-2 w-full rounded-lg bg-white p-2 shadow-lg ring-1 ring-gray-950/5 transition dark:bg-gray-900 dark:ring-white/10"
                            x-show="isSearchingAssistants"
                            x-on:click.outside="isSearchingAssistants = false"
                            x-on:close-assistant-search.window="isSearchingAssistants = false"
                        >
                            {{ $assistantSwitcherForm }}
                        </div>
                    @endif
                </div>

                <template x-if="$wire.threadsWithoutAFolder.length">
                    <ul
                        class="flex flex-col gap-y-1 rounded-xl border border-gray-950/5 bg-white p-2 shadow-sm dark:border-white/10 dark:bg-gray-900"
                        id="folder-{{ null }}"
                        x-on:drop.prevent="drop('{{ null }}')"
                        x-on:dragenter.prevent
                        x-on:dragover.prevent
                    >
                        <template
                            x-for="thread in $wire.threadsWithoutAFolder"
                            :key="thread.id"
                        >
                            <li
                                :id="`chat-${thread.id}`"
                                x-on:message-sent.window="updateTitle"
                                x-tooltip="`Last Engaged: ${lastUpdated}`"
                                x-data="{
                                    lastUpdated: new Date(thread.last_engaged_at).toLocaleDateString('en-US', {
                                        year: 'numeric',
                                        month: 'short',
                                        day: 'numeric'
                                    }),
                                    updateTitle: function(event) {
                                        if (event.detail.threadId === thread.id) {
                                            this.lastUpdated = new Date().toLocaleDateString('en-US', {
                                                year: 'numeric',
                                                month: 'short',
                                                day: 'numeric'
                                            });
                                        }
                                    }
                                }"
                                :class="{
                                    'px-2 group flex rounded-lg w-full items-center outline-none transition duration-75 hover:bg-gray-100 focus:bg-gray-100 dark:hover:bg-white/5 dark:focus:bg-white/5 space-x-1': true,
                                    'bg-gray-100 dark:bg-white/5': thread.id === $wire.thread?.id
                                }"
                            >
                                <div class="flex flex-1 items-center gap-3">
                                    <template x-if="$wire.folders.length">
                                        <button
                                            type="button"
                                            draggable="true"
                                            x-on:dragstart="start(thread.id, null)"
                                            x-on:dragend="end"
                                            :class="{
                                                'flex items-center cursor-move': true,
                                                'text-gray-700 dark:text-gray-200': thread.id !== $wire.thread?.id,
                                                'text-primary-600 dark:text-primary-400': thread.id === $wire.thread?.id
                                            }"
                                        >
                                            <template x-if="loading.type !== 'thread' || loading.identifier !== thread.id">
                                                <x-heroicon-m-bars-2 class="h-5 w-5" />
                                            </template>

                                            <template x-if="loading.type === 'thread' && loading.identifier === thread.id">
                                                <x-filament::loading-indicator class="h-5 w-5" />
                                            </template>
                                        </button>
                                    </template>

                                    <button
                                        class="relative flex flex-1 items-center justify-center gap-x-3 rounded-lg py-2 text-left text-sm"
                                        type="button"
                                        x-on:click="selectThread(thread)"
                                    >
                                        <span
                                            x-text="thread.name"
                                            :class="{
                                                'flex-1 truncate': true,
                                                'text-gray-700 dark:text-gray-200': thread.id !== $wire
                                                    .selectedThreadId,
                                                'text-primary-600 dark:text-primary-400': thread.id === $wire
                                                    .selectedThreadId
                                            }"
                                        >
                                        </span>
                                    </button>
                                </div>

                                <div class="flex items-center gap-1">
                                    <template
                                        x-if="loading.type !== 'moveThreadAction' || loading.identifier !== thread.id">
                                        <x-filament::icon-button
                                            class="relative hidden h-5 w-5 group-hover:inline-flex"
                                            icon="heroicon-m-arrow-down-on-square"
                                            x-on:click="moveThread(thread.id)"
                                            label="Move chat to a different folder"
                                            color="warning"
                                            size="{{ ActionSize::ExtraSmall }}"
                                        />
                                    </template>
                                    <template
                                        x-if="loading.type === 'moveThreadAction' && loading.identifier === thread.id">
                                        <x-filament::loading-indicator
                                            class="relative hidden h-5 w-5 group-hover:inline-flex"
                                        />
                                    </template>

                                    <template
                                        x-if="loading.type !== 'editThreadAction' || loading.identifier !== thread.id">
                                        <x-filament::icon-button
                                            class="relative hidden h-5 w-5 group-hover:inline-flex"
                                            icon="heroicon-m-pencil"
                                            x-on:click="editThread(thread.id)"
                                            label="Edit name of the chat"
                                            color="warning"
                                            size="{{ ActionSize::ExtraSmall }}"
                                        />
                                    </template>
                                    <template
                                        x-if="loading.type === 'editThreadAction' && loading.identifier === thread.id">
                                        <x-filament::loading-indicator
                                            class="relative hidden h-5 w-5 group-hover:inline-flex"
                                        />
                                    </template>

                                    <template
                                        x-if="loading.type !== 'deleteThreadAction' || loading.identifier !== thread.id"
                                    >
                                        <x-filament::icon-button
                                            class="relative hidden h-5 w-5 group-hover:inline-flex"
                                            icon="heroicon-m-trash"
                                            x-on:click="deleteThread(thread.id)"
                                            label="Delete the chat"
                                            color="danger"
                                            size="{{ ActionSize::ExtraSmall }}"
                                        />
                                    </template>
                                    <template
                                        x-if="loading.type === 'deleteThreadAction' && loading.identifier === thread.id"
                                    >
                                        <x-filament::loading-indicator
                                            class="relative hidden h-5 w-5 group-hover:inline-flex"
                                        />
                                    </template>
                                </div>
                            </li>
                        </template>
                    </ul>
                </template>
                <template x-if="!$wire.threadsWithoutAFolder.length">
                    <div
                        class="flex flex-col gap-y-1 rounded-xl border border-dashed border-gray-950/5 bg-white px-3 py-2 text-gray-500 shadow-sm dark:border-white/10 dark:bg-gray-900"
                        x-show="dragging"
                        x-on:drop.prevent="drop('{{ null }}')"
                        x-on:dragenter.prevent
                        x-on:dragover.prevent
                    >
                        <div class="text-sm">
                            Drag chats here to move them out of a folder
                        </div>
                    </div>
                </template>
                <template x-if="$wire.folders.length">
                    <div
                        class="flex flex-col gap-y-3 rounded-xl border border-gray-950/5 bg-white p-2 shadow-sm dark:border-white/10 dark:bg-gray-900">
                        <template
                            x-for="folder in $wire.folders"
                            :key="folder.id"
                        >
                            <ul
                                class="flex flex-col gap-y-1"
                                :id="`folder-${folder.id}`"
                                x-on:drop.prevent="drop(folder.id)"
                                x-on:dragenter.prevent
                                x-on:dragover.prevent
                            >
                                <span
                                    class="group flex w-full cursor-move items-center rounded-lg px-2 outline-none transition duration-75 hover:bg-gray-100 focus:bg-gray-100 dark:hover:bg-white/5 dark:focus:bg-white/5"
                                >
                                    <x-filament::icon-button
                                        icon="heroicon-o-folder-open"
                                        x-show="expanded(folder.id)"
                                        x-on:click="expand(folder.id)"
                                    />
                                    <x-filament::icon-button
                                        icon="heroicon-o-folder"
                                        x-show="! expanded(folder.id)"
                                        x-on:click="expand(folder.id)"
                                    />

                                    <div
                                        class="group flex w-full cursor-pointer items-center space-x-1 rounded-lg px-2 outline-none transition duration-75 focus:bg-gray-100 dark:focus:bg-white/5">
                                        <div
                                            class="relative flex flex-1 items-center justify-center gap-x-3 rounded-lg py-2 text-sm"
                                            x-on:click="expand(folder.id)"
                                        >
                                            <div
                                                class="flex-1 truncate"
                                                x-bind:class="{
                                                    'text-primary-600 dark:text-primary-400': expanded(folder.id)
                                                }"
                                                x-text="`${folder.name} ${folder.threads.length ? '(' + folder.threads.length + ')' : ''}`"
                                            ></div>
                                        </div>

                                        <div class="flex items-center gap-1">
                                            <template
                                                x-if="loading.type !== 'renameFolderAction' || loading.identifier !== folder.id"
                                            >
                                                <x-filament::icon-button
                                                    class="relative hidden h-5 w-5 group-hover:inline-flex"
                                                    icon="heroicon-m-pencil"
                                                    x-on:click="renameFolder(folder.id)"
                                                    label="Rename Folder"
                                                    color="warning"
                                                    size="{{ ActionSize::ExtraSmall }}"
                                                />
                                            </template>
                                            <template
                                                x-if="loading.type === 'renameFolderAction' && loading.identifier === folder.id"
                                            >
                                                <x-filament::loading-indicator
                                                    class="relative hidden h-5 w-5 group-hover:inline-flex"
                                                />
                                            </template>

                                            <template
                                                x-if="loading.type !== 'deleteFolderAction' || loading.identifier !== folder.id"
                                            >
                                                <x-filament::icon-button
                                                    class="relative hidden h-5 w-5 group-hover:inline-flex"
                                                    icon="heroicon-m-trash"
                                                    x-on:click="deleteFolder(folder.id)"
                                                    label="Delete Folder"
                                                    color="danger"
                                                    size="{{ ActionSize::ExtraSmall }}"
                                                />
                                            </template>
                                            <template
                                                x-if="loading.type === 'deleteFolderAction' && loading.identifier === folder.id"
                                            >
                                                <x-filament::loading-indicator
                                                    class="relative hidden h-5 w-5 group-hover:inline-flex"
                                                />
                                            </template>
                                        </div>
                                    </div>
                                </span>
                                <template
                                    x-for="thread in folder.threads"
                                    :key="thread.id"
                                >
                                    <li
                                        :id="`chat-${thread.id}`"
                                        x-on:message-sent.window="updateTitle"
                                        x-tooltip="`Last Engaged: ${lastUpdated}`"
                                        x-data="{
                                            lastUpdated: new Date(thread.messages_max_created_at).toLocaleDateString('en-US', {
                                                year: 'numeric',
                                                month: 'short',
                                                day: 'numeric'
                                            }),
                                            updateTitle: function(event) {
                                                if (event.detail.threadId === thread.id) {
                                                    this.lastUpdated = new Date().toLocaleDateString('en-US', {
                                                        year: 'numeric',
                                                        month: 'short',
                                                        day: 'numeric'
                                                    });
                                                }
                                            }
                                        }"
                                        x-show="expanded(folder.id)"
                                        :class="{
                                            'px-2 group flex rounded-lg w-full items-center outline-none transition duration-75 hover:bg-gray-100 focus:bg-gray-100 dark:hover:bg-white/5 dark:focus:bg-white/5 space-x-1': true,
                                            'bg-gray-100 dark:bg-white/5': thread.id === $wire.thread?.id
                                        }"
                                    >
                                        <div class="flex flex-1 items-center gap-3">
                                            <button
                                                type="button"
                                                draggable="true"
                                                x-on:dragstart="start(thread.id, folder.id)"
                                                x-on:dragend="end"
                                                :class="{
                                                    'flex items-center cursor-move': true,
                                                    'text-gray-700 dark:text-gray-200': thread.id !== $wire.thread?.id,
                                                    'text-primary-600 dark:text-primary-400': thread.id === $wire.thread
                                                        ?.id
                                                }"
                                            >
                                                <template
                                                    x-if="loading.type !== 'thread' || loading.identifier !== thread.id"
                                                >
                                                    <x-heroicon-m-bars-2 class="h-5 w-5" />
                                                </template>

                                                <template
                                                    x-if="loading.type === 'thread' && loading.identifier === thread.id"
                                                >
                                                    <x-filament::loading-indicator class="h-5 w-5" />
                                                </template>
                                            </button>

                                            <button
                                                class="relative flex flex-1 items-center justify-center gap-x-3 rounded-lg py-2 text-left text-sm"
                                                type="button"
                                                x-on:click="selectThread(thread)"
                                            >
                                                <span
                                                    x-text="thread.name"
                                                    :class="{
                                                        'flex-1 truncate': true,
                                                        'text-gray-700 dark:text-gray-200': thread.id !== $wire
                                                            .selectedThreadId,
                                                        'text-primary-600 dark:text-primary-400': thread.id === $wire
                                                            .selectedThreadId
                                                    }"
                                                >
                                                </span>
                                            </button>
                                        </div>

                                        <div class="flex items-center gap-1">
                                            <template
                                                x-if="loading.type !== 'moveThreadAction' || loading.identifier !== thread.id"
                                            >
                                                <x-filament::icon-button
                                                    class="relative hidden h-5 w-5 group-hover:inline-flex"
                                                    icon="heroicon-m-arrow-down-on-square"
                                                    x-on:click="moveThread(thread.id)"
                                                    label="Move chat to a different folder"
                                                    color="warning"
                                                    size="{{ ActionSize::ExtraSmall }}"
                                                />
                                            </template>
                                            <template
                                                x-if="loading.type === 'moveThreadAction' && loading.identifier === thread.id"
                                            >
                                                <x-filament::loading-indicator
                                                    class="relative hidden h-5 w-5 group-hover:inline-flex"
                                                />
                                            </template>

                                            <template
                                                x-if="loading.type !== 'editThreadAction' || loading.identifier !== thread.id"
                                            >
                                                <x-filament::icon-button
                                                    class="relative hidden h-5 w-5 group-hover:inline-flex"
                                                    icon="heroicon-m-pencil"
                                                    x-on:click="editThread(thread.id)"
                                                    label="Edit name of the chat"
                                                    color="warning"
                                                    size="{{ ActionSize::ExtraSmall }}"
                                                />
                                            </template>
                                            <template
                                                x-if="loading.type === 'editThreadAction' && loading.identifier === thread.id"
                                            >
                                                <x-filament::loading-indicator
                                                    class="relative hidden h-5 w-5 group-hover:inline-flex"
                                                />
                                            </template>

                                            <template
                                                x-if="loading.type !== 'deleteThreadAction' || loading.identifier !== thread.id"
                                            >
                                                <x-filament::icon-button
                                                    class="relative hidden h-5 w-5 group-hover:inline-flex"
                                                    icon="heroicon-m-trash"
                                                    x-on:click="deleteThread(thread.id)"
                                                    label="Delete the chat"
                                                    color="danger"
                                                    size="{{ ActionSize::ExtraSmall }}"
                                                />
                                            </template>
                                            <template
                                                x-if="loading.type === 'deleteThreadAction' && loading.identifier === thread.id"
                                            >
                                                <x-filament::loading-indicator
                                                    class="relative hidden h-5 w-5 group-hover:inline-flex"
                                                />
                                            </template>
                                        </div>
                                    </li>
                                </template>
                            </ul>
                        </template>
                    </div>
                </template>
            </div>
        @endcapture

        <div
            class="grid h-full flex-1 grid-cols-1 grid-rows-[1fr_auto] gap-2 lg:grid-cols-3 lg:gap-x-6 lg:gap-y-4 2xl:grid-cols-4"
            x-data="chats($wire)"
        >
            <div class="col-span-1 hidden overflow-y-auto px-px pt-3 lg:block lg:pt-6">
                {{ $sidebarContent($this->assistantSwitcherForm) }}
            </div>

            <div
                class="col-span-1 flex flex-col gap-2 overflow-hidden pt-3 lg:col-span-2 lg:pt-6 2xl:col-span-3"
                x-data="chat({
                    csrfToken: @js(csrf_token()),
                    retryMessageUrl: @js(route('ai.threads.messages.retry', ['thread' => $this->thread])),
                    sendMessageUrl: @js(route('ai.threads.messages.send', ['thread' => $this->thread])),
                    completeResponseUrl: @js(route('ai.threads.messages.complete-response', ['thread' => $this->thread])),
                    showThreadUrl: @js(route('ai.threads.show', ['thread' => $this->thread])),
                    userId: @js(auth()->user()->id),
                    threadId: @js($this->thread->id)
                })"
                x-on:send-prompt.window="await sendMessage($event.detail.prompt)"
                wire:key="thread{{ $this->thread->id }}"
            >
                <div class="flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <div class="lg:hidden">
                            <x-filament::dropdown
                                shift
                                placement="bottom-start"
                                width="lg"
                                x-on:close-assistant-sidebar.window="close"
                            >
                                <x-slot name="trigger">
                                    <x-filament::icon-button
                                        label="Open menu"
                                        icon="heroicon-s-bars-3"
                                    />
                                </x-slot>

                                <div class="p-3">
                                    {{ $sidebarContent($this->assistantSwitcherMobileForm) }}
                                </div>
                            </x-filament::dropdown>
                        </div>

                        @if ($this->customAssistants)
                            <x-filament::badge :size="ActionSize::Large">
                                <h1 class="text-xxs uppercase leading-3">
                                    {{ $this->thread->assistant->name }}
                                </h1>
                            </x-filament::badge>
                        @endif
                    </div>

                    @if (!$this->thread->assistant->is_default && !$this->thread->assistant->archived_at)
                        <x-filament::link
                            :color="$this->thread->assistant->isUpvoted() ? 'success' : 'gray'"
                            icon="heroicon-m-chevron-up"
                            tag="button"
                            wire:click="toggleAssistantUpvote"
                        >
                            {{ $this->thread->assistant->isUpvoted() ? 'Upvoted' : 'Upvote' }} assistant
                            ({{ $this->thread->assistant->upvotes()->count() }})
                        </x-filament::link>
                    @endif
                </div>

                <div
                    class="flex flex-1 flex-col-reverse overflow-y-scroll rounded-xl border border-gray-950/5 text-sm shadow-sm dark:border-white/10 dark:bg-gray-800">
                    <div
                        class="bg-danger-100 px-4 py-2 dark:bg-danger-900"
                        x-cloak
                        x-show="error"
                    >
                        <span x-text="error"></span>

                        <span x-show="! (isRetryable || isRateLimited)">We will inform you once you can retry sending
                            your message.</span>

                        <x-filament::link
                            x-on:click="retryMessage"
                            x-show="isRetryable && (! isRateLimited)"
                            tag="button"
                            color="gray"
                        >Click here to retry.
                        </x-filament::link>
                    </div>

                    <div
                        class="flex h-full w-full items-center justify-center"
                        x-show="isLoading"
                    >
                        <x-filament::loading-indicator class="h-12 w-12" />

                        Loading messages
                    </div>

                    <div
                        class="divide-y dark:divide-gray-800"
                        x-cloak
                    >
                        <template x-for="(message, messageIndex) in messages">
                            <div class="group w-full bg-white dark:bg-gray-900">
                                <div
                                    class="m-auto justify-center px-4 text-base md:gap-6"
                                    x-bind:class="{
                                        'bg-primary-100 dark:bg-primary-900 py-2': message.prompt,
                                        'py-4 md:py-6': !
                                            message.prompt
                                    }"
                                >
                                    <div
                                        class="mx-auto flex flex-1 gap-4 text-base md:max-w-2xl md:gap-6 lg:max-w-[38rem] xl:max-w-3xl"
                                        x-show="! message.prompt"
                                    >
                                        <div class="relative flex flex-shrink-0 flex-col items-end">
                                            <img
                                                class="h-8 w-8 rounded-full object-cover object-center"
                                                x-bind:src="message.user_id ? (users[message.user_id]?.avatar_url ??
                                                    @js(filament()->getUserAvatarUrl(auth()->user()))) : @js($this->thread->assistant->getFirstTemporaryUrl(now()->addHour(), 'avatar', 'thumbnail') ?: \Illuminate\Support\Facades\Vite::asset('resources/images/canyon-ai-headshot.jpg'))"
                                                x-bind:alt="message.user_id ? (users[message.user_id]?.name ?? @js(auth()->user()->name . ' avatar')) :
                                                    @js($this->thread->assistant->name . ' avatar')"
                                            />
                                        </div>
                                        <div
                                            class="relative flex w-[calc(100%-50px)] flex-col gap-1 md:gap-3 lg:w-[calc(100%-115px)]">
                                            <div class="flex max-w-full flex-grow flex-col gap-3">
                                                <div
                                                    class="flex min-h-[20px] flex-col items-start gap-3 overflow-x-auto break-words">
                                                    <div
                                                        class="prose dark:prose-invert"
                                                        x-html="message.content"
                                                    ></div>

                                                    <x-filament::link
                                                        tag="button"
                                                        x-on:click="completeResponse"
                                                        x-show="isIncomplete && (messageIndex === (messages.length - 1))"
                                                    >
                                                        Click here to continue generating
                                                    </x-filament::link>
                                                </div>
                                            </div>
                                            <div class="flex justify-between empty:hidden lg:block">
                                                <div
                                                    class="visible mt-2 flex justify-center gap-2 self-end text-gray-400 md:gap-3 lg:absolute lg:right-0 lg:top-0 lg:mt-0 lg:translate-x-full lg:gap-1 lg:self-center lg:pl-2"
                                                    x-data="{
                                                        messageCopied: false,
                                                        copyMessage: function() {
                                                            navigator.clipboard.writeText(message.content.replace(/(<([^>]+)>)/gi, ''))
                                                    
                                                            this.messageCopied = true
                                                    
                                                            setTimeout(() => { this.messageCopied = false }, 2000)
                                                        }
                                                    }"
                                                >
                                                    <x-filament::icon
                                                        class="ml-auto flex h-6 w-6 cursor-pointer items-center gap-2 rounded-md p-1 text-xs hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200 disabled:dark:hover:text-gray-400"
                                                        icon="heroicon-o-clipboard-document-check"
                                                        x-show="messageCopied"
                                                    />
                                                    <x-filament::icon
                                                        class="ml-auto flex h-6 w-6 cursor-pointer items-center gap-2 rounded-md p-1 text-xs hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200 disabled:dark:hover:text-gray-400"
                                                        icon="heroicon-o-clipboard"
                                                        x-show="! messageCopied"
                                                        x-on:click="copyMessage"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div x-show="message.prompt">
                                        <span class="font-medium">
                                            Starting smart prompt:
                                        </span>

                                        <span x-text="message.prompt"></span>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                @if (!$this->thread->assistant->archived_at)
                    <form x-on:submit.prevent="sendMessage()">
                        <div
                            class="w-full overflow-hidden rounded-xl border border-gray-950/5 bg-gray-50 shadow-sm dark:border-white/10 dark:bg-gray-700">
                            @if ($this->thread->assistant->model->getService()->supportsMessageFileUploads())
                                <div class="flex items-center justify-start gap-x-4 gap-y-3 p-4">
                                    {{ $this->uploadFilesAction }}

                                    @foreach ($this->files as $key => $file)
                                        <x-filament::badge>
                                            {{ $file['name'] }}
                                            <x-slot
                                                name="deleteButton"
                                                label="Remove uploaded file {{ $file['name'] }}"
                                                wire:click="removeUploadedFile({{ $key }})"
                                            ></x-slot>
                                        </x-filament::badge>
                                    @endforeach
                                </div>
                            @endif
                            <div class="bg-white dark:bg-gray-800">
                                <label
                                    class="sr-only"
                                    for="message_input"
                                >Type here</label>
                                <textarea
                                    class="min-h-20 w-full resize-none border-0 bg-white p-4 text-sm text-gray-900 focus:ring-0 dark:bg-gray-800 dark:text-white dark:placeholder-gray-400"
                                    id="message_input"
                                    x-ref="messageInput"
                                    x-model="message"
                                    x-on:set-chat-message.window="message = $event.detail.content"
                                    x-on:input="render()"
                                    x-intersect.once="render()"
                                    x-on:resize.window="render()"
                                    x-bind:disabled="isSendingMessage"
                                    placeholder="Type here..."
                                    required
                                    maxlength="25000"
                                >
                                </textarea>
                            </div>
                            <div
                                class="flex flex-col items-center border-t px-3 py-2 dark:border-gray-600 sm:flex-row sm:justify-between">
                                <div class="flex w-full flex-col gap-3 sm:w-auto sm:flex-row sm:items-center">
                                    <x-filament::button
                                        class="w-full sm:w-auto"
                                        type="submit"
                                    >
                                        Send
                                    </x-filament::button>

                                    {{ $this->insertFromPromptLibraryAction }}

                                    <div
                                        class="flex w-full justify-center py-2 sm:w-auto"
                                        x-show="isSendingMessage"
                                    >
                                        <x-filament::loading-indicator class="h-5 w-5 text-primary-500" />
                                    </div>
                                </div>

                                @if (blank($this->thread->name))
                                    <div class="flex w-full justify-center pt-3 sm:w-auto sm:pl-2 sm:pt-0">
                                        {{ $this->saveThreadAction }}
                                    </div>
                                @else
                                    <div class="flex w-full justify-center gap-1.5 pt-3 sm:w-auto sm:pt-0">
                                        {{ ($this->cloneThreadAction)(['thread' => $this->thread->id]) }}
                                        {{ ($this->emailThreadAction)(['thread' => $this->thread->id]) }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                @else
                    <div
                        class="w-full rounded-xl border border-gray-950/5 bg-gray-50 p-4 text-sm shadow-sm dark:border-white/10 dark:bg-gray-900">
                        This assistant has been archived by an administrator and can no longer be contacted.
                    </div>
                @endif
            </div>

            <div class="col-span-full hidden md:block">
                <x-footer />
            </div>

            <div class="col-span-full mb-2 text-center text-xs md:hidden">
                © 2016-{{ date('Y') }} <a
                    class="text-blue-600 underline dark:text-blue-400"
                    href="https://canyongbs.com/"
                >Canyon GBS LLC</a>.
            </div>
        </div>
    @elseif (!$this->isConsented)
        <div x-init="$nextTick(() => $dispatch('open-modal', { id: 'consent-agreement' }))">
            <x-filament::modal
                id="consent-agreement"
                width="5xl"
                alignment="left"
                :close-by-clicking-away="false"
                :close-button="false"
            >
                <x-slot name="header">
                    <h2 class="text-left text-xl font-semibold text-gray-950 dark:text-white">
                        {{ $this->consentAgreement->title }}
                    </h2>
                </x-slot>

                <div class="prose max-w-none text-left dark:prose-invert">
                    {{ str($this->consentAgreement->description)->markdown()->sanitizeHtml()->toHtmlString() }}
                </div>

                <x-filament::section>
                    <div class="prose max-w-none text-left text-[.7rem] leading-4 dark:prose-invert">
                        {{ str($this->consentAgreement->body)->markdown()->sanitizeHtml()->toHtmlString() }}
                    </div>
                </x-filament::section>

                <x-slot name="footer">
                    <form
                        class="flex w-full flex-col gap-6"
                        wire:submit="confirmConsent"
                    >
                        <label>
                            <x-filament::input.checkbox required />

                            <span class="ml-2 text-sm font-medium">
                                I agree to the terms and conditions
                            </span>
                        </label>

                        <div class="flex justify-start gap-3">
                            <x-filament::button
                                wire:click="denyConsent"
                                outlined
                            >
                                Cancel
                            </x-filament::button>
                            <x-filament::button type="submit">
                                Continue
                            </x-filament::button>
                        </div>
                    </form>
                </x-slot>
            </x-filament::modal>
        </div>
    @elseif (!$this->thread)
        <div
            class="flex h-full w-full items-center justify-center"
            wire:init="loadFirstThread"
        >
            <x-filament::loading-indicator class="h-12 w-12" />
        </div>
    @endif

    <script src="{{ url('js/canyon-gbs/ai/chat.js') . '?v=' . app('current-commit') }}"></script>
    <script src="{{ url('js/canyon-gbs/ai/chats.js') . '?v=' . app('current-commit') }}"></script>
    <style>
        .choices__inner .prompt-upvotes-count {
            display: none;
        }

        .footer {
            display: none
        }
    </style>

    <x-filament-actions::modals />
</div>
