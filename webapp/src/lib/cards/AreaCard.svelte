<script lang="ts">
    import Card from "$lib/cards/Card.svelte";
    import Area from "$lib/charts/Area.svelte";
    import TimeSet from "$lib/charts/TimeSet.svelte";


    interface Props {
        title: string | null,
        link: string | null,
        data: ApexAxisChartSeries
    }
    let {title, link, data} : Props = $props()
</script>

<Card title={title} link={link}>
    <div slot="tool">
        <div class="flex items-center gap-4 h-full">
            <TimeSet/>
            <div class="h-3/4 bg-neutral-200 border"></div>
            <button aria-label="download charts"><i class="fi fi-br-file-download text-lg text-neutral-700"></i></button>
        </div>
    </div>
    <div class="h-72">
        <Area data={data}/>
    </div>
</Card>
