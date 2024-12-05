<script lang="ts">
    import Card from "$lib/cards/Card.svelte";
    import type { Personality } from "$lib/types/Personality";
    import {type ToolsOption} from "$lib/types/Tools";

    interface Props {
        title?: string;
        link?: string;
        toolsOption?: ToolsOption;
        personalities: Personality[];
    }
    const { title, link, toolsOption, personalities }: Props = $props();

    const calculateAverageChange = (personality: Personality): number => {
        const viewsData = personality.views.history;
        const subscribersData = personality.subscribers.history;

        if (!viewsData || !subscribersData || viewsData.length < 2 || subscribersData.length < 2) {
            return 0;
        }

        const viewsLast = viewsData[viewsData.length - 1].value;
        const viewsSecondLast = viewsData[viewsData.length - 2].value;

        const subscribersLast = subscribersData[subscribersData.length - 1].value;
        const subscribersSecondLast = subscribersData[subscribersData.length - 2].value;

        const viewsChange = ((viewsLast - viewsSecondLast) / viewsSecondLast) * 100;
        const subscribersChange = ((subscribersLast - subscribersSecondLast) / subscribersSecondLast) * 100;

        return (viewsChange + subscribersChange) / 2;
    };

    const formatNumber = (num: number): string => {
        if (num >= 1_000_000) {
            return (num / 1_000_000).toFixed(2).replace(/\.?0+$/, '') + 'M';
        } else if (num >= 1_000) {
            return (num / 1_000).toFixed(2).replace(/\.?0+$/, '') + 'K';
        } else {
            return num.toString();
        }
    };
</script>

<Card title={title} link={link} toolsOption={toolsOption}>
    <div class="flex flex-col gap-7 mt-4 scroll-hidden overflow-y-scroll max-h-80">
        {#each personalities as personality, index}
            <div class="flex items-center gap-4">
                <img class="object-cover w-10 h-10 rounded-full" alt="{personality.name}" src="{personality.image}"/>
                <div class="flex flex-col text-sm w-full">
                    <p class="font-bold">{personality.name}</p>
                    <p class="text-neutral-400 font-semibold">{formatNumber(personality.views.history[personality.views.history.length - 1].value)} Views - {formatNumber(personality.subscribers.history[personality.subscribers.history.length - 1].value)} Subscribers</p>
                </div>
                <div class="flex items-center gap-2">
                    <p class="text-lg font-bold">{index + 1}</p>
                    {#if calculateAverageChange(personality) > 0}
                        <i class="fi fi-sr-caret-up text-lime-500 h-full flex items-center justify-center w-7"></i>
                    {:else if calculateAverageChange(personality) < 0}
                        <i class="fi fi-sr-caret-down text-red-500 h-full flex items-center justify-center w-7"></i>
                    {:else}
                        <i class="fi fi-br-minus h-full text-sm flex items-center justify-center w-7"></i>
                    {/if}
                </div>
            </div>
        {/each}
    </div>
</Card>
