<script lang="ts">
    import {onMount} from "svelte";

    let chartDiv: HTMLDivElement;
    const options = {
        chart: {
            type: 'area',
            toolbar: false,
            zoom: false,
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            curve: 'smooth',
            colors: ['#1fdd00'],
            width: 2
        },
        tooltip: {
            enabled: true
        },
        series: [{
            name: 'sales',
            data: [30, 40, 35, 42]
        }],
        dataLabels: {
            enabled: false
        },
        xaxis: {
            labels: {
                show: false
            },
            axisTicks: {
                show: false
            },
            axisBorder: {
                show: false,
            }
        },
        yaxis: {
            labels: {
                show: false
            }
        },
        grid: {
            show: false
        },
        colors: ['#89ff75']
    };

    onMount(async () => {
        const ApexCharts = ((await import("apexcharts")).default);
        let chart = new ApexCharts(chartDiv, options);
        await chart.render();
    });
</script>

<div class="w-full" bind:this={chartDiv}></div>