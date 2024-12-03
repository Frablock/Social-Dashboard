<script lang="ts">
    import '../app.css';
    import logo from "$lib/assets/logo.png";
    import NavLi from "$lib/menu/NavLi.svelte";

	let { children } = $props();
</script>

<div class="bg-background h-screen w-screen flex text-neutral-900">
    <nav class="bg-secondary shadow-lg shadow-neutral-200 rounded-r-3xl px-6 w-64 flex flex-col justify-between">
        <div>
            <a href="/"><img class="my-10" alt="logo" src="{logo}"/></a>
            <ul class="flex flex-col gap-3">
                <li><NavLi name="Dashboard" link="/"><i class="fi fi-sr-home flex items-center"></i></NavLi></li>
                <li><NavLi name="Subscribers" link="/subscribers"><i class="fi fi-sr-users flex items-center"></i></NavLi></li>
                <li><NavLi name="Views" link="/views"><i class="fi fi-sr-eye flex items-center"></i></NavLi></li>
            </ul>
        </div>
        <div>
            <ul>
                <li><NavLi name="Settings" link="/settings"><i class="fi fi-sr-settings flex items-center"></i></NavLi></li>
            </ul>
            <hr class="my-3">
            <button class="flex items-center gap-2 font-bold p-4 w-full">
                <img class="w-10 rounded-full" alt="user" src="https://thispersondoesnotexist.com/"/>
                John Doe
            </button>
        </div>
    </nav>
    <div class="w-full text-2xl p-10 overflow-x-auto">
        {@render children()}
    </div>
</div>
