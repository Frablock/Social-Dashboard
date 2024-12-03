<script lang="ts">
    import Card from "$lib/cards/Card.svelte";
    import { personnalities } from "$lib/data";

    export let title: string | null = null;
    export let link: string | null = null;
    export let data: Personality[] = []

    const calculateAverageChange = (personality: Personality): number => {
        if (personality.views.length < 2 || personality.subscribers.length < 2) {
            return 0;
        }

        const viewsLast = personality.views[personality.views.length - 1];
        const viewsSecondLast = personality.views[personality.views.length - 2];

        const subscribersLast = personality.subscribers[personality.subscribers.length - 1];
        const subscribersSecondLast = personality.subscribers[personality.subscribers.length - 2];

        const viewsChange = ((viewsLast.y - viewsSecondLast.y) / viewsSecondLast.y) * 100;
        const subscribersChange = ((subscribersLast.y - subscribersSecondLast.y) / subscribersSecondLast.y) * 100;

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

<Card title={title} link={link}>
    <div class="flex flex-col gap-7 mt-4 overflow-x-auto overflow-y-auto">
        {#each data as personality, index}
            <div class="flex items-center gap-4">
                <img class="object-cover w-10 h-10 rounded-full" alt="{personality.name}" src="{personality.image}"/>
                <div class="flex flex-col text-sm w-full">
                    <p class="font-bold">{personality.name}</p>
                    <p class="text-neutral-400 font-semibold">{formatNumber(personality.views[0].y)} Views - {formatNumber(personality.subscribers[0].y)} Subscribers</p>
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
