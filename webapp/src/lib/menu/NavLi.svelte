<script lang="ts">
    export let name: string = "Button";
    export let link: string = "";
    import { page } from "$app/stores";
</script>

<a href="{link}" class="{$page.url.pathname === link ? 'bg-primary bg-opacity-10 text-primary' : 'hover:bg-primary hover:bg-opacity-5 hover:text-primary text-neutral-700 font-medium'} font-semibold w-full rounded-lg flex justify-start items-center">
    <div class="flex items-center justify-center p-4">
        <slot/>
    </div>
    <span class="hidden md:inline">{name}</span>
</a>