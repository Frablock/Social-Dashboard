<script lang="ts">
    import {onMount} from "svelte";


    interface Props {
        data: ApexAxisChartSeries,
        seriesLimit: number
    }

    let {data, seriesLimit = 3} : Props = $props();


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
            max: 2200000
        },
        grid: {
            show: true,
        },
        series: data.slice(0, seriesLimit)
    };

    let chartDiv: HTMLDivElement;

    onMount(async () => {
        const ApexCharts = ((await import("apexcharts")).default);
        let chart = new ApexCharts(chartDiv, options);
        await chart.render();
    });
</script>

<div class="w-full" bind:this={chartDiv}></div>