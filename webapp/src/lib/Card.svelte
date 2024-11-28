<script lang="ts">
    import TimeSet from "$lib/charts/TimeSet.svelte";

    export let title: string;
</script>

<div class="rounded-2xl p-5 bg-secondary border border-gray-200 shadow-xl shadow-neutral-100 pb-10">
    <div class="flex justify-between text-neutral-500 mx-4">
        <a href="/socials"><h3 class="text-base font-semibold hover:text-black">{title}</h3></a>
        <div class="flex">
            <TimeSet/>
            <i class="fi fi-br-download text-lg"></i>
        </div>
    </div>
    <slot/>
</div>