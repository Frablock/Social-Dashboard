<script lang="ts">
    import Card from "$lib/cards/Card.svelte";
    import Area from "$lib/charts/Area.svelte";
    import TimeSet from "$lib/charts/TimeSet.svelte";

    export let title: string | null = null;
    export let link: string | null = null;
    export let data: ApexAxisChartSeries = [];
</script>

<Card title="{ title }" link="{ link }">
    <div slot="tool">
        <div class="flex items-center gap-4 h-full">
            <TimeSet/>
            <div class="h-3/4 bg-neutral-200 border"></div>
            <button aria-label="download charts"><i class="fi fi-br-file-download text-lg text-neutral-700"></i></button>
        </div>
    </div>
    <div class="h-72">
        <Area data="{data}"/>
    </div>
</Card>
