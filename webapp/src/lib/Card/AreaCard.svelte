<script lang="ts">
    import Card from "$lib/Card/Card.svelte";
    import Area from "$lib/charts/Area.svelte";
    import TimeSet from "$lib/charts/TimeSet.svelte";

    export let title: string | null = null;
    export let link: string | null = null;
</script>

<Card title="{ title }" link="{ link }">
    <div slot="tool">
        <div class="flex gap-4">
            <TimeSet/>
            <button aria-label="download charts"><i class="fi fi-br-file-download text-lg text-neutral-700"></i></button>
        </div>
    </div>
    <div class="h-72">
        <Area/>
    </div>
</Card>