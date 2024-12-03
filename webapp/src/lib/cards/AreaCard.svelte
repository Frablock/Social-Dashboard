<script lang="ts">
    import Card from "$lib/cards/Card.svelte";
    import Area from "$lib/charts/Area.svelte";
    import Time from "$lib/cards/Tools/Time.svelte";
    import Top from "./Tools/Top.svelte"

    interface Props {
        title: string | null,
        link?: string | null,
        data: ApexAxisChartSeries
    }
    let {title, link = "", data} : Props = $props()
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
    <div class="h-72">
        <Area data={data}/>
    </div>
</Card>
