<script lang="ts">
    export let title: string;
</script>

<div class="rounded-2xl p-5 bg-secondary border border-gray-200 shadow-xl shadow-neutral-100 pb-10">
    <div class="flex justify-between text-neutral-500 mx-4">
        <a href="/socials"><h3 class="text-base font-semibold hover:text-black">{title}</h3></a>
        <i class="fi fi-br-download text-lg"></i>
    </div>
    <slot/>
</div>