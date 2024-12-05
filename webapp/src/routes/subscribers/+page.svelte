<script lang="ts">
    import PageHeader from "$lib/PageHeader.svelte";
    import AreaCard from "$lib/cards/AreaCard.svelte";
    import LeaderCard from "$lib/cards/LeaderCard.svelte";
    import {generateChartSeries, personnalities} from "$lib/data";
</script>

<PageHeader title="Subscribers"/>
<div class="grid grid-rows-3 gap-4">
    <div class="grid grid-cols-1 row-span-1 gap-4">
        <div class="col-span-1"><AreaCard title="Progress" series="{generateChartSeries(personnalities)}"/></div>
    </div>
    <div class="grid grid-cols-2 row-span-2 gap-4">
        <div class="col-span-1"><LeaderCard title="All Social Media" personalities={personnalities.slice(0, 5)}/></div>
        <div class="col-span-1"><LeaderCard title="Best Performance" personalities={personnalities.slice(0, 5)}/></div>
    </div>
</div>