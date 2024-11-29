<script lang="ts">
    export let title: string | null = null;
    export let link: string | null = null;
</script>

<div class="rounded-2xl p-7 bg-secondary border border-gray-100 shadow-md shadow-neutral-100 pb-10 h-full">
    <div class="flex justify-between text-neutral-500">
        <div class="relative group text-base text-neutral-800 font-bold h-6">
            {#if link}
                <a href="{link}">{title}</a>
                <div class="absolute left-0 bottom-[-1px] h-[3px] rounded-full bg-neutral-600 w-0 group-hover:w-full transition-all duration-500 ease-out"></div>
            {:else}
                <h3>{title}</h3>
            {/if}
        </div>
        <slot name="tool"/>
    </div>
    <slot/>
</div>