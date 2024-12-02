<script lang="ts">
    let selectedButton = 0;

    function setSelectedButton(index: number) {
        selectedButton = index;
    }
</script>

<div class="bg-white text-sm font-bold flex justify-center relative gap-1">
    <button
        class="w-7 relative"
        on:click={() => setSelectedButton(0)}
    >
        7J
    </button>
    <button
        class="w-7 relative"
        on:click={() => setSelectedButton(1)}
    >
        30J
    </button>
    <button
        class="w-7 relative"
        on:click={() => setSelectedButton(2)}
    >
        1A
    </button>
    <div
        class="absolute bottom-[-4px] left-1 h-1 bg-neutral-700 w-1/4 rounded transition-all duration-300 flex justify-center"
        style="transform: translateX(calc(133% * {selectedButton}));"
    ></div>
</div>