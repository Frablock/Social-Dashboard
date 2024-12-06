<script lang="ts">
    import Card from "$lib/cards/Card.svelte";
    import LittleArea from "$lib/charts/LittleArea.svelte";
    import {generateChartSeries, getDatedValues} from "$lib/data";
    import { StatsType } from '$lib/types/Personality';
    import type { Personality } from "$lib/types/Personality";

    interface Props {
        title?: string;
        link?: string;
        personality: Personality;
        target?: StatsType;
    }
    const { title, link, personality, target = StatsType.Views}: Props = $props();

    const series = generateChartSeries([personality], target, 4);
    const values = getDatedValues(personality, target);
    const diff = (values[values.length - 1].value - values[values.length - 2].value) / values[values.length - 2].value;
</script>

<Card title={title} link={link}>
    <div class="flex justify-between items-end h-full">
        <div class="h-full flex flex-col justify-end gap-4">
            <p class="text-3xl font-bold">{ new Intl.NumberFormat('en-US').format(values[values.length - 1].value) }</p>
            <div class="py-1 px-2 {diff >= 0 ? 'bg-[#89ff75] bg-opacity-50 text-lime-900' : 'bg-[#ff4464] bg-opacity-25 text-red-900'} rounded-full w-fit text-xs font-bold">
                { (diff * 100).toFixed(2) }%
            </div>
        </div>
        <div class="h-28 w-40 flex flex-col justify-end">
            <LittleArea series={series} upgrade={diff >= 0} />
        </div>
    </div>
</Card>