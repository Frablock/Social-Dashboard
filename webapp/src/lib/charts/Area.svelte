<script lang="ts">
    import {onMount} from "svelte";

    export let data: ApexAxisChartSeries = [];

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
        tooltip: {
            enabled: true,
            y : {
                formatter: (value: number) => {
                    return value.toLocaleString();
                }
            },
            custom: ({
                 series,
                 seriesIndex,
                 dataPointIndex,
                 w
            }: {
                series: any;
                seriesIndex: number;
                dataPointIndex: number;
                w: any;
            }) => {
                const number = parseInt(series[seriesIndex][dataPointIndex]);
                const timestamp = w.globals.seriesX[seriesIndex][dataPointIndex];
                const date = new Date(timestamp);
                const month = date.toLocaleString('en-US', { month: 'long' });

                const formattedNumber = new Intl.NumberFormat('en-US', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(number);

                return `
                    <div class="flex flex-col p-2 rounded-2xl">
                        <div class="font-bold text-2sm text-gray-600">
                            ${month}
                        </div>
                        <div class="flex items-center gap-1.5">
                            <div class="text-md text-gray-900">
                                ${formattedNumber}
                            </div>
                            <i class="fi fi-br-arrow-up-right text-md text-lime-500"></i>
                        </div>
                    </div>
                `;
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            type: 'datetime',
            labels: {
                show: true,
                formatter: (value: number) => {
                    if (!value) return '';
                    const date = new Date(value);
                    const month = date.toLocaleString('en-US', { month: 'short' });
                    return `${month}`;
                }
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
        series: data
    };

    console.log(data);

    let chartDiv: HTMLDivElement;

    onMount(async () => {
        const ApexCharts = ((await import("apexcharts")).default);
        let chart = new ApexCharts(chartDiv, options);
        await chart.render();
    });
</script>

<div class="w-full" bind:this={chartDiv}></div>