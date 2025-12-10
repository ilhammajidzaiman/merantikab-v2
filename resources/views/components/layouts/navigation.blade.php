@php
    use App\Models\Link;
    use App\Models\Page;
@endphp
<nav id="navbar">
    <x-section class="fixed top-0 left-0 w-full z-50">
        <x-wrapper>
            <x-container class="space-y-8">
                <div class="rounded-xl shadow-md  bg-white/50 backdrop-blur-xs">
                    <nav aria-label="Global" class="mx-auto flex w-full items-center justify-between px-4 py-3  ">
                        <div class="flex lg:flex-1">
                            <a href="{{ route('index') }}">
                                <div class="flex items-center justify-center md:justify-start w-full gap-2">
                                    <img src="{{ asset('image/logo-meranti.png') }}" alt="Logo"
                                        class="w-12 h-12 object-contain" />
                                    <div
                                        class="flex flex-col leading-tight text-shadow-xs text-shadow-slate-50 text-slate-800">
                                        <h1 class="text-xs font-medium">
                                            {{ $siteInformation->tagline ?? null }}
                                        </h1>
                                        <h1 class="text-lg md:text-xl font-extrabold">
                                            {{ $siteInformation->name ?? null }}
                                        </h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="flex lg:hidden">
                            <button type="button" command="show-modal" commandfor="mobile-menu"
                                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                                <span class="sr-only">Open main menu</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    data-slot="icon" aria-hidden="true" class="size-6">
                                    <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                        <el-popover-group class="hidden lg:flex lg:gap-x-5">
                            @foreach ($menu as $parent)
                                @php
                                    if ($parent->modelable_type === Page::class):
                                        $urlParent = route('page.show', $parent->page->slug);
                                    elseif ($parent->modelable_type === Link::class):
                                        $urlParent = $parent->link->url;
                                    endif;
                                @endphp
                                @if (count($parent->children) > 0)
                                    <div class="relative">
                                        <button popovertarget="desktop-menu-{{ $parent->id }}"
                                            class="group flex items-center gap-x-1 text-normal font-medium text-slate-900 hover:text-emerald-700 transition duration-200 ease-in-out rounded-xl">
                                            <span class="relative">
                                                {{ $parent->title ?? null }}
                                                <span
                                                    class="absolute left-1/2 -bottom-1 w-10 h-1 bg-emerald-700 rounded-full -translate-x-1/2 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center">
                                                </span>
                                            </span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="size-4 flex-none text-slate-900 group-hover:text-emerald-700 transition duration-200 ease-in-out">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                        <el-popover id="desktop-menu-{{ $parent->id }}" anchor="bottom" popover
                                            class="w-xs max-w-sm overflow-hidden rounded-xl bg-white shadow-sm outline-1 outline-gray-900/5 transition transition-discrete [--anchor-gap:--spacing(3)] backdrop:bg-transparent open:block data-closed:translate-y-1 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-150 data-leave:ease-in divide-y divide-slate-200">
                                            @foreach ($parent->children as $child)
                                                @php
                                                    if ($child->modelable_type === Page::class):
                                                        $urlChild = route('page.show', $child->page->slug);
                                                    elseif ($child->modelable_type === Link::class):
                                                        $urlChild = $child->link->url;
                                                    endif;
                                                @endphp
                                                <div
                                                    class="relative flex items-center gap-4 hover:bg-gray-100 px-4 py-2 ">
                                                    <a wire:navigate href="{{ $urlChild ?? null }}"
                                                        class="block text-slate-600 hover:text-emerald-600">
                                                        {{ $child->title ?? null }}
                                                    </a>
                                                </div>
                                            @endforeach
                                        </el-popover>
                                    </div>
                                @else
                                    <a wire:navigate href="{{ $urlParent ?? null }}"
                                        class="text-slate-700 relative text-normal font-medium rounded-xl transition duration-200 ease-in-out hover:text-emerald-700 group">
                                        {{ $parent->title ?? null }}
                                        <span
                                            class="absolute left-1/2 -bottom-1 w-10 h-1 bg-emerald-700 rounded-full -translate-x-1/2 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center">
                                        </span>
                                    </a>
                                @endif
                            @endforeach
                        </el-popover-group>
                    </nav>
                    <el-dialog>
                        <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">
                            <div tabindex="0" class="fixed inset-0 focus:outline-none">
                                <el-dialog-panel
                                    class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white p-4">
                                    <div
                                        class="flex items-center justify-between shadow rounded-xl overflow-hidden px-4 py-3">
                                        <a href="{{ route('index') }}">
                                            <div class="flex items-center justify-center md:justify-start w-full gap-2">
                                                <img src="{{ asset('image/logo-meranti.png') }}" alt="Logo"
                                                    class="w-12 h-12 object-contain" />
                                                <div class="flex flex-col leading-tight">
                                                    <h1
                                                        class="text-xs font-medium text-slate-800 text-shadow-xs text-shadow-slate-50">
                                                        {{ $siteInformation->tagline ?? null }}
                                                    </h1>
                                                    <h1
                                                        class="text-lg md:text-xl font-extrabold text-slate-800 text-shadow-xs text-shadow-slate-50">
                                                        {{ $siteInformation->name ?? null }}
                                                    </h1>
                                                </div>
                                            </div>
                                        </a>
                                        <button type="button" command="close" commandfor="mobile-menu"
                                            class="-m-2.5 rounded-md p-2.5 text-gray-700">
                                            <span class="sr-only">Close menu</span>
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                                                <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mt-6 flow-root">
                                        <div class="-my-6 divide-y divide-gray-500/10">
                                            <div class="space-y-2 py-6">
                                                @foreach ($menu as $parent)
                                                    @php
                                                        if ($parent->modelable_type === Page::class):
                                                            $urlParent = $parent->page->slug;
                                                        elseif ($parent->modelable_type === Link::class):
                                                            $urlParent = $parent->link->url;
                                                        endif;
                                                    @endphp
                                                    @if (count($parent->children) > 0)
                                                        <div class="">
                                                            <button type="button" command="--toggle"
                                                                commandfor="mobile-menu-{{ $parent->id ?? null }}"
                                                                class="flex w-full items-center justify-between rounded-xl py-2 font-semibold">
                                                                {{ $parent->title ?? null }}
                                                                <svg viewBox="0 0 20 20" fill="currentColor"
                                                                    data-slot="icon" aria-hidden="true"
                                                                    class="size-5 flex-none in-aria-expanded:rotate-180">
                                                                    <path
                                                                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                                                        clip-rule="evenodd" fill-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                            <el-disclosure id="mobile-menu-{{ $parent->id ?? null }}"
                                                                hidden class="space-y-2">
                                                                <div
                                                                    class="bg-slate-50 divide-y divide-slate-200 rounded-xl">
                                                                    @foreach ($parent->children as $child)
                                                                        @php
                                                                            if ($child->modelable_type === Page::class):
                                                                                $urlChild = route(
                                                                                    'page.show',
                                                                                    $child->page->slug,
                                                                                );
                                                                            elseif (
                                                                                $child->modelable_type === Link::class
                                                                            ):
                                                                                $urlChild = $child->link->url;
                                                                            endif;
                                                                        @endphp
                                                                        <div class="flex items-center pl-4">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 24"
                                                                                stroke-width="1.5"
                                                                                stroke="currentColor" class="size-4">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                                                            </svg>
                                                                            <a wire:navigate
                                                                                href="{{ $urlChild ?? null }}"
                                                                                class="block px-4 py-2 hover:underline">
                                                                                {{ $child->title ?? null }}
                                                                            </a>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </el-disclosure>
                                                        </div>
                                                    @else
                                                        <a wire:navigate href="{{ $urlParent ?? null }}"
                                                            class="-mx-3 block rounded-xl px-3 py-2 text-normal/7 font-semibold text-gray-900 hover:bg-gray-50">
                                                            {{ $parent->title ?? null }}
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </el-dialog-panel>
                            </div>
                        </dialog>
                    </el-dialog>
                </div>
            </x-container>
        </x-wrapper>
    </x-section>
</nav>
