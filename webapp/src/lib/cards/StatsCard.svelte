<script lang="ts">
    import Card from "$lib/cards/Card.svelte";
    import LittleArea from "$lib/charts/LittleArea.svelte";

    export let title: string | null = null;
    export let link: string | null = null;
</script>

<Card title="{title}" link="{link}">
    <div class="flex justify-between h-full">
        <div class="h-full flex flex-col justify-end gap-4">
            <p class="text-3xl font-bold">1.86M</p>
            <div class="py-1 px-2 bg-[#89ff75] text-lime-900 bg-opacity-50 rounded-full w-fit text-xs font-semibold">
                + 1.29%
            </div>
        </div>
        <div class="h-full w-40 flex flex-col justify-end">
            <LittleArea/>
        </div>
    </div>
</Card>