<script lang="ts">
    import Card from "$lib/cards/Card.svelte";
    import Area from "$lib/charts/Area.svelte";
    import Time from "$lib/cards/Tools/Time.svelte";
    import Top from "./Tools/Top.svelte"
    import {type Personality, StatsType} from "$lib/types/Personality";
    import {generateChartSeries} from "$lib/data.js";

    interface Props {
        title: string | null,
        link?: string | null,
        personalities: Personality[],
        target?: StatsType
    }
    let {title, link = "", personalities, target = StatsType.Views} : Props = $props()
</script>

<Card title={title} link={link}>
    <div slot="tool">
        <div class="flex items-center gap-4 h-full">
            <Time/>
            <div class="h-1/2 bg-neutral-200 w-0.5"></div>
            <Top/>
            <div class="h-1/2 bg-neutral-200 w-0.5"></div>
            <button aria-label="download charts"><i class="fi fi-br-file-download text-lg text-neutral-700"></i></button>
        </div>
    </div>
    <div class="h-80">
        <Area series={generateChartSeries(personalities, target)}/>
    </div>
</Card>
