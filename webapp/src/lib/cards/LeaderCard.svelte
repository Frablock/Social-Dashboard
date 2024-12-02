<script lang="ts">
    import Card from "$lib/cards/Card.svelte";

    export let link: string | null = null;


    interface Personality {
        name: string;
        image: string;
        views: number;
        subscribers: number;
        status: "downgrade" | "upgrade" | "stable";
    }

    let personnalities: Array<Personality> = [
        {name: "Antoine Léaument", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTX8Fbg_qoMpayUly-ED6NVaJ7cvKQhbgnvNA&s", views: 7, subscribers: 1.2, status: "upgrade"},
        {name: "Manuel Bompard", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxN76pFbVV--_UG3RPpQzYEMqYKlQyLO2MHQ&s", views: 3, subscribers: 1.1, status: "stable"},
        {name: "Mathilde Panot", image: "https://www.assemblee-nationale.fr/dyn/static/tribun/17/photos/carre/720892.jpg", views: 1, subscribers: 1, status: "upgrade"},
        {name: "Jordan Bardella", image: "https://static.actu.fr/uploads/2024/11/jordan-bardella-2-960x640.jpg", views: 1, subscribers: 1, status: "downgrade"},
    ];
</script>

<Card title="Leaderboard" link="{link}">
    {#each personnalities as personality, index}
        <div class="flex items-center gap-4 mt-8">
            <img class="object-cover w-12 h-12 rounded-full" alt="{personality.name}" src="{personality.image}"/>
            <div class="flex flex-col text-sm w-full">
                <p class="font-bold">{personality.name}</p>
                <p class="text-neutral-400 font-semibold">{personality.views}K Views - {personality.subscribers}K Subscribers</p>
            </div>
            <div class="flex items-center gap-2">
                <p class="text-lg font-bold">{index + 1}</p>
                {#if personality.status === "upgrade"}
                    <i class="fi fi-sr-caret-up text-lime-500 h-full flex items-center w-5"></i>
                {:else if personality.status === "downgrade"}
                    <i class="fi fi-sr-caret-down text-red-500 h-full flex items-center w-5"></i>
                {:else}
                    <p class="h-full flex items-center w-5 justify-center text-4xl">-</p>
                {/if}
            </div>
        </div>
    {/each}
</Card>
