<script lang="ts">
    export let title: string;
</script>

<div class="rounded-2xl py-2 px-4 bg-secondary border border-gray-200 shadow-xl shadow-neutral-100 pb-10">
    <div class="flex justify-between text-neutral-500">
        <h3 class="text-base font-semibold">{title}</h3>
        <i class="fi fi-br-download text-lg"></i>
    </div>
    <slot/>
</div>