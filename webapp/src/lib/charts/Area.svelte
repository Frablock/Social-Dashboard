<script lang="ts">
    import {onMount} from "svelte";

    let chartDiv: HTMLDivElement;

    const categories =  ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'];

    const options = {
        chart: {
            type: 'line',
            toolbar: false,
            zoom: false,
            height: '100%'
        },
        stroke: {
            curve: 'straight',
            colors: ['#7b13d6']
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
                const month = w.globals.seriesX[seriesIndex][dataPointIndex];
                const monthName = categories[month];

                return `
                    <div class="flex flex-col gap-2 p-3.5">
                        <div class="font-medium text-2sm text-gray-600">
                            ${month}
                        </div>
                        <div class="flex items-center gap-1.5">
                            <div class="font-semibold text-md text-gray-900">
                                ${number}
                            </div>
                            <span class="badge badge-outline badge-success badge-xs">
                                +24%
                            </span>
                        </div>
                    </div>
                `;
            }
        },
        series: [{
            data: [{
                x: new Date('2023-11').getTime(),
                y: 357000
            },{
                x: new Date('2023-12').getTime(),
                y: 357000
            }, {
                x: new Date('2024-01').getTime(),
                y: 1280000
            }, {
                x: new Date('2024-02').getTime(),
                y: 600000
            }, {
                x: new Date('2024-03').getTime(),
                y: 1130000
            }, {
                x: new Date('2024-04').getTime(),
                y: 350000
            }, {
                x: new Date('2024-05').getTime(),
                y: 2000000
            }, {
                x: new Date('2024-06').getTime(),
                y: 652000
            }, {
                x: new Date('2024-07').getTime(),
                y: 218000
            }, {
                x: new Date('2024-08').getTime(),
                y: 298000
            }, {
                x: new Date('2024-09').getTime(),
                y: 677000
            }, {
                x: new Date('2024-10').getTime(),
                y: 450000
            }, {
                x: new Date('2024-11').getTime(),
                y: 510000
            }],
        }],
        dataLabels: {
            enabled: false
        },
        xaxis: {
            type: 'datetime',
            labels: {
                show: true
            },
            axisTicks: {
                show: false
            },
            axisBorder: {
                show: false,
            },
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        },
        yaxis: {
            labels: {
                show: true,
                formatter: (value: number) => {
                    if (value >= 1000) {
                        return Math.round(value/1000) + 'k';
                    }
                    return value;
                }
            },
            max: 2200000
        },
        grid: {
            show: true,
        },
        colors: ['#7b13d6']
    };

    onMount(async () => {
        const ApexCharts = ((await import("apexcharts")).default);
        let chart = new ApexCharts(chartDiv, options);
        await chart.render();
    });
</script>

<div class="w-full" bind:this={chartDiv}></div>