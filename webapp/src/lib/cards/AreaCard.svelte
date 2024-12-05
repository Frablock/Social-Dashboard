<script lang="ts">
    import Card from "$lib/cards/Card.svelte";
    import Area from "$lib/charts/Area.svelte";
    import {type Personality, StatsType} from "$lib/types/Personality";
    import {generateChartSeries} from "$lib/data.js";
    import type {ToolsOption} from "$lib/types/Tools";

    interface Props {
        title?: string,
        link?: string,
        toolsOption?: ToolsOption;
        personalities: Personality[],
        target?: StatsType
    }
    let {title, link, toolsOption, personalities, target = StatsType.Views} : Props = $props()
</script>

<Card title={title} link={link} toolsOption={toolsOption}>
    <div class="h-80">
        <Area series={generateChartSeries(personalities, target)}/>
    </div>
</Card>
