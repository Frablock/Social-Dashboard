<script lang="ts">
    import PageHeader from "$lib/PageHeader.svelte";
    import AreaCard from "$lib/cards/AreaCard.svelte";
    import StatsCard from "$lib/cards/StatsCard.svelte";
    import LeaderCard from "$lib/cards/LeaderCard.svelte";
    import { personalities} from "$lib/data";
    import { StatsType } from "$lib/types/Personality";

    let antoine = personalities[0];
</script>

<PageHeader title="Dashboard"/>
<div class="grid gap-4">
    <div class="grid gap-4 lg:grid-cols-2 2xl:grid-cols-4">
        <div><StatsCard title="Weekly Views" link="/views" personality={antoine} target={StatsType.Views}></StatsCard></div>
        <div><StatsCard title="Weekly Subscribers" link="/subscribers" personality={antoine} target={StatsType.Subscribers}></StatsCard></div>
        <div><StatsCard title="Weekly Likes" personality={antoine} target={StatsType.Likes}></StatsCard></div>
        <div><StatsCard title="Weekly Comments" personality={antoine} target={StatsType.Comments}></StatsCard></div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-7 gap-4">
        <div class="lg:col-span-5">
            <AreaCard title="Weekly Views" link="/views" toolsOption={{download: true, time: true, top: true}} personalities={personalities} target={StatsType.Views} />
        </div>
        <div class="lg:col-span-2">
            <LeaderCard title="Weekly Performances" personalities={personalities.slice(0, 5)} toolsOption={{download: false, time: false, top: true}} />
        </div>
    </div>
</div>