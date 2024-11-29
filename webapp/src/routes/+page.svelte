<script lang="ts">
    import PageHeader from "$lib/PageHeader.svelte";
    import Card from '$lib/Card/Card.svelte'
    import AreaCard from "$lib/Card/AreaCard.svelte";
    import StatsCard from "$lib/Card/StatsCard.svelte";
</script>

<PageHeader title="Dashboard"/>
<div class="grid grid-rows-3 gap-4">
    <div class="grid grid-flow-col row-span-1 gap-4">
        <div><StatsCard title="Weekly Views"></StatsCard></div>
        <div><StatsCard title="Weekly Likes"></StatsCard></div>
        <div><StatsCard title="Weekly Comments"></StatsCard></div>
        <div><StatsCard title="Weekly Subscribers"></StatsCard></div>
    </div>
    <div class="grid grid-cols-5 row-span-2 gap-4">
        <div class="col-span-3"><AreaCard title="Social Media" link="/socials"/></div>
        <div class="col-span-2"><Card></Card></div>
    </div>
</div>