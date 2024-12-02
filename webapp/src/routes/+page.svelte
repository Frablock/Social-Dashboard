<script lang="ts">
    import PageHeader from "$lib/PageHeader.svelte";
    import AreaCard from "$lib/cards/AreaCard.svelte";
    import StatsCard from "$lib/cards/StatsCard.svelte";
    import LeaderCard from "$lib/cards/LeaderCard.svelte";

    let personnalities: Array<Personality> = [
        {name: "Antoine Léaument", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTX8Fbg_qoMpayUly-ED6NVaJ7cvKQhbgnvNA&s", views: 7, subscribers: 1.2, status: "upgrade"},
        {name: "Manuel Bompard", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxN76pFbVV--_UG3RPpQzYEMqYKlQyLO2MHQ&s", views: 3, subscribers: 1.1, status: "stable"},
        {name: "Mathilde Panot", image: "https://www.assemblee-nationale.fr/dyn/static/tribun/17/photos/carre/720892.jpg", views: 1, subscribers: 1, status: "upgrade"},
        {name: "Gabriel Attal", image: "https://upload.wikimedia.org/wikipedia/commons/d/d8/Gabriel_Attal%2C_February_2023.jpg", views: 1, subscribers: 1, status: "downgrade"},
        {name: "Marine Tondelier", image: "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/20210819_tondelier.m-cr3.jpg/640px-20210819_tondelier.m-cr3.jpg", views: 1, subscribers: 1, status: "downgrade"},
        {name: "Clemence Guetté", image: "https://www.assemblee-nationale.fr/dyn/static/tribun/17/photos/carre/795310.jpg", views: 1, subscribers: 1, status: "downgrade"},
        {name: "Louis Boyard", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrLf5Iln3re0SCBMFB2qRQcisn69PTJ_Rvwg&s", views: 1, subscribers: 1, status: "downgrade"},
        {name: "Rima Hassan", image: "https://upload.wikimedia.org/wikipedia/commons/6/6c/MEP_Rima_Hassan.jpg", views: 1, subscribers: 1, status: "downgrade"},
        {name: "Louis Boyard", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrLf5Iln3re0SCBMFB2qRQcisn69PTJ_Rvwg&s", views: 1, subscribers: 1, status: "downgrade"},
        {name: "Louis Boyard", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrLf5Iln3re0SCBMFB2qRQcisn69PTJ_Rvwg&s", views: 1, subscribers: 1, status: "downgrade"}
    ];

    let compareSeries: ApexAxisChartSeries = [];

    const generateMonthsForYear = (year: number): Date[] => {
        return Array.from({ length: 12 }, (_, i) => new Date(year, i, 2));
    };

    console.log(generateMonthsForYear(2024));

    personnalities.forEach((personality) => {
        let seriesData = generateMonthsForYear(2024).map((date) => {
            return {
                x: date,
                y: Math.floor(Math.random() * (2000000 - 300000)) + 300000
            };
        });

        compareSeries.push({
            name: personality.name,
            data: seriesData
        });
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
        <div class="col-span-5"><AreaCard title="Compare" link="/compare" data="{compareSeries}"/></div>
        <div class="col-span-2"><LeaderCard link="/compare/"></LeaderCard></div>
    </div>
</div>