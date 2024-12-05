<script lang="ts">
    import { onMount } from 'svelte';

    interface Props {
        title: string,
    }
    let {title} : Props = $props();

    type SocialMedia = {
        name: string;
        iconClass: string;
    };

    const socialMedias: SocialMedia[] = [
        { name: 'All Social Media', iconClass: 'fi-br-apps' },
        { name: 'Facebook', iconClass: 'fi-brands-facebook' },
        { name: 'Twitter', iconClass: 'fi-brands-twitter' },
        { name: 'Instagram', iconClass: 'fi-brands-instagram' },
        { name: 'Youtube', iconClass: 'fi-brands-youtube' },
        { name: 'TikTok', iconClass: 'fi-brands-tik-tok' },
    ];

    let isOpen = $state(false);
    let selectedSocialMedia: SocialMedia = $state(socialMedias[0]);

    function toggleDropdown() {
        isOpen = !isOpen;
    }

    function selectSocialMedia(socialMedia: SocialMedia) {
        selectedSocialMedia = socialMedia;
        isOpen = false;
    }

    function handleOutsideClick(event: MouseEvent) {
        const dropdown = document.querySelector('.dropdown-menu');
        if (dropdown && !dropdown.contains(event.target as Node)) {
            isOpen = false;
        }
    }

    onMount(() => {
        document.addEventListener('click', handleOutsideClick);
        return () => {
            document.removeEventListener('click', handleOutsideClick);
        };
    });
</script>

<div class="flex justify-between">
    <h1 class="font-bold">{title}</h1>
    <div class="flex h-fit gap-8">
        <div class="relative inline-block text-left dropdown-menu">
            <button
                    class="flex justify-center items-center gap-2 w-64 h-full bg-white rounded-xl border border-gray-200 px-5 text-base font-semibold"
                    onclick={toggleDropdown}
                    type="button"
            >
                <i class="fi {selectedSocialMedia.iconClass} text-sm flex justify-center items-center"></i>
                {selectedSocialMedia.name}
                <svg
                        class="w-5 h-5 ml-2"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            {#if isOpen}
                <ul
                        class="absolute mt-2 w-full bg-white border border-gray-200 rounded-xl shadow-lg z-10"
                >
                    {#each socialMedias as socialMedia}
                        <li>
                            <button
                                    class="flex items-center text-base gap-2 px-5 py-2 hover:bg-gray-100 w-full text-left {socialMedia === selectedSocialMedia ? 'font-bold' : '    '}"
                                    onclick={() => selectSocialMedia(socialMedia)}
                                    type="button"
                            >
                                <i class="{socialMedia.iconClass} text-sm flex justify-center items-center"></i>
                                {socialMedia.name}
                            </button>
                        </li>
                    {/each}
                </ul>
            {/if}
        </div>
        <button class="flex gap-4">
            <img class="w-10 h-10 rounded-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTX8Fbg_qoMpayUly-ED6NVaJ7cvKQhbgnvNA&s" alt="Antoine Léaument" />
            <div class="flex flex-col">
                <p class="text-base font-semibold">Antoine Léaument</p>
                <p class="text-sm text-red-800 font-medium">La France Insoumise</p>
            </div>
        </button>
    </div>
</div>
<hr class="my-7">
