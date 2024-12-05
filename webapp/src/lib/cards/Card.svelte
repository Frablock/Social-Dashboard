<script lang="ts">
    import Time from "$lib/cards/Tools/Time.svelte";
    import Top from "$lib/cards/Tools/Top.svelte";
    import {TimeOption, type ToolsOption} from "$lib/types/Tools";
    import {setContext, type Snippet} from "svelte";
    import {writable} from "svelte/store";
    import Download from "$lib/cards/Tools/Download.svelte";

    interface Props {
        title?: string;
        link?: string;
        toolsOption?: ToolsOption;
        children: Snippet;
    }
    const { title, link, toolsOption = {download: false, time: false, top: false}, children }: Props = $props();

    let tools = [];

    if (toolsOption.time) {
        let time = writable<TimeOption>(TimeOption.J7);
        setContext("timeOption", time);
        tools.push({component: Time});
    }
    if (toolsOption.top) {
        let top = writable<number>(3);
        setContext("topOption", top);
        tools.push({component: Top});
    }
    if (toolsOption.download) {
        tools.push({component: Download});
    }
</script>

<div class="rounded-2xl p-7 bg-secondary border border-gray-100 shadow-md shadow-neutral-100 h-fit">
    <div class="flex justify-between text-neutral-500">
        <div class="relative group text-base text-neutral-800 font-bold h-6">
            {#if link}
                <a href="{link}">{title}</a>
                <div class="absolute left-0 bottom-[-1px] h-[3px] rounded-full bg-neutral-600 w-0 group-hover:w-full transition-all duration-500 ease-out"></div>
            {:else}
                <h3>{title}</h3>
            {/if}
        </div>
        <div class="flex items-center gap-4 h-full">
            {#each tools as Tool, index}
                <Tool.component />
                {#if index < tools.length - 1}
                    <div class="h-1/2 bg-neutral-200 w-0.5"></div>
                {/if}
            {/each}
        </div>
    </div>
    {@render children()}
</div>