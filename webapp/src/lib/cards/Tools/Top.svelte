<script lang="ts">
    import {writable, type Writable} from "svelte/store";

    export const topOption: Writable<number> = writable(3);

    let selectedButton = 0;

    $: {
        const limit = $topOption;
        if (limit === 3) selectedButton = 0;
        else if (limit === 5) selectedButton = 1;
        else if (limit === 10) selectedButton = 2;
    }

    function setSelectedButton(index: number, limit: number) {
        selectedButton = index;
        topOption.set(limit);
    }
</script>

<div class="bg-white text-sm font-bold flex justify-center relative gap-1">
    <button
            class="w-7 relative"
            on:click={() => setSelectedButton(0, 3)}
    >
        3
    </button>
    <button
            class="w-7 relative"
            on:click={() => setSelectedButton(1, 5)}
    >
        5
    </button>
    <button
            class="w-7 relative"
            on:click={() => setSelectedButton(2, 10)}
    >
        10
    </button>
    <div
            class="absolute bottom-[-4px] left-1 h-1 bg-neutral-700 w-1/4 rounded transition-all duration-300 flex justify-center"
            style="transform: translateX(calc(133% * {selectedButton}));"
    ></div>
</div>