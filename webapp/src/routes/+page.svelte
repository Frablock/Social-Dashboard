<script lang="ts">
    import PageHeader from "$lib/PageHeader.svelte";
    import AreaCard from "$lib/cards/AreaCard.svelte";
    import StatsCard from "$lib/cards/StatsCard.svelte";
    import LeaderCard from "$lib/cards/LeaderCard.svelte";
    import {getMonthlyValue, personnalities} from "$lib/data";

    let average: ApexAxisChartSeries = [];
    personnalities.forEach((personality, index) => {
        average.push({
            name: personality.name,
            data: getMonthlyValue(personality.subscribers),
        })
    });
</script>

<PageHeader title="Dashboard"/>
<div class="grid grid-rows-3 gap-4">
    <div class="grid grid-flow-col row-span-1 gap-4">
        <div><StatsCard title="Weekly Views"></StatsCard></div>
        <div><StatsCard title="Weekly Likes"></StatsCard></div>
        <div><StatsCard title="Weekly Comments"></StatsCard></div>
        <div><StatsCard title="Weekly Subscribers"></StatsCard></div>
    </div>
    <div class="grid grid-cols-7 row-span-2 gap-4">
        <div class="col-span-5"><AreaCard title="Views" link="/views" data={average}/></div>
        <div class="col-span-2"><LeaderCard title="Performances" data={personnalities.slice(0, 5)}></LeaderCard></div>
    </div>
</div>