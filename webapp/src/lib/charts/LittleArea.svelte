<script lang="ts">
    import {onMount} from "svelte";

    interface Props {
        series: ApexAxisChartSeries;
        upgrade: boolean;
    }
    const { series, upgrade = true }: Props = $props();

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
        dataLabels: {
            enabled: false
        },
        xaxis: {
            type: 'datetime',
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
                show: false,
                formatter: (value: number) => {
                    if (value >= 1000000) {
                        return `${(value / 1000000).toFixed(2)}M`;
                    }
                    if (value >= 1000) {
                        return `${(value / 1000).toFixed(0)}k`;
                    }
                    return value.toFixed(2);
                },
                style: {
                    colors: [],
                    fontSize: '12px',
                    fontFamily: 'Helvetica, Arial, sans-serif',
                    fontWeight: 700,
                    cssClass: 'apexcharts-yaxis-label',
                }
            }
        },
        grid: {
            show: false
        },
        colors: ['#89ff75'],
        series: series
    };

    if (!upgrade) {
        options.stroke.colors = ['#FF0000'];
        options.colors = ['#ff4464']
    }

    onMount(async () => {
        const ApexCharts = ((await import("apexcharts")).default);
        let chart = new ApexCharts(chartDiv, options);
        await chart.render();
    });
</script>

<div class="w-full" bind:this={chartDiv}></div>