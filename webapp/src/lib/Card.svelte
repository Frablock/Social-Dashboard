<script lang="ts">
    export let title: string;
</script>

<div class="rounded-2xl py-2 px-4 bg-secondary border border-gray-200 shadow-xl shadow-neutral-100">
    <h3 class="text-base font-medium text-neutral-500">{title}</h3>
    <slot/>
</div>