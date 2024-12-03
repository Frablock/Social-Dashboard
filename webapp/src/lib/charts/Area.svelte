<script lang="ts">
    import {getContext, onMount} from "svelte";
    import { topLimit } from "$lib/stores";
    import { get } from "svelte/store";
    import {personnalities} from "$lib/data";

    interface Props {
        data: ApexAxisChartSeries,
    }
    let {data} : Props = $props();

    const options = {
        chart: {
            type: 'line',
            toolbar: false,
            zoom: false,
            height: '100%',
        },
        stroke: {
            curve: 'smooth'
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            type: 'datetime',
            labels: {
                show: true,
            },
            axisTicks: {
                show: false
            },
            axisBorder: {
                show: false,
            },
        },
        yaxis: {
            labels: {
                show: true,
                formatter: (value: number) => {
                    if (value >= 1000) {
                        const formattedNumber = new Intl.NumberFormat('en-US', {
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0
                        }).format(Math.round(value/1000));
                        return formattedNumber + 'k';
                    }
                    return value;
                },
                style: {
                    colors: [],
                    fontSize: '12px',
                    fontFamily: 'Helvetica, Arial, sans-serif',
                    fontWeight: 700,
                    cssClass: 'apexcharts-yaxis-label',
                },
            },
            min: 0,
        },
        grid: {
            show: true,
        },
        legend: {
            position: 'right',
            horizontalAlign: 'center',
            fontWeight: 700,
            itemMargin: {
                vertical: 5
            },
            markers: {
                offsetX: -5,
            },
        },
        series: data.slice(0, get(topLimit)),
    };

    let chartDiv: HTMLDivElement;
    let chart: ApexCharts;

    onMount(() => {
        let unsubscribe: () => void;

        (async () => {
            const ApexCharts = (await import("apexcharts")).default;
            chart = new ApexCharts(chartDiv, options);
            await chart.render();

            unsubscribe = topLimit.subscribe((limit: number) => {
                if (chart) {
                    chart.updateSeries(data.slice(0, limit));
                }
            });
        })();

        return () => {
            if (unsubscribe) unsubscribe();
            if (chart) chart.destroy();
        };
    });
</script>

<div class="w-full" bind:this={chartDiv}></div>