<script lang="ts">
    import PageHeader from "$lib/PageHeader.svelte";
    import Card from "$lib/Card.svelte";
    import Area from "$lib/charts/Area.svelte";
</script>

<PageHeader title="Dashboard"/>
<Card title="Social media">
    <div class="h-72">
        <Area/>

    </div>
</Card>