<script lang="ts">
    import {onMount} from "svelte";

    let chartDiv: HTMLDivElement;

    const options = {
        chart: {
            type: 'line',
            toolbar: false,
            zoom: false,
            height: '100%'
        },
        stroke: {
            curve: 'straight'
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
        series: [{
            name: "Youtube",
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
        }, {
            name: "X",
            data: [{
                x: new Date('2023-11').getTime(),
                y: 157353
            },{
                x: new Date('2023-12').getTime(),
                y: 257025
            }, {
                x: new Date('2024-01').getTime(),
                y: 280032
            }, {
                x: new Date('2024-02').getTime(),
                y: 424253
            }, {
                x: new Date('2024-03').getTime(),
                y: 305000
            }, {
                x: new Date('2024-04').getTime(),
                y: 208354
            }, {
                x: new Date('2024-05').getTime(),
                y: 350245
            }, {
                x: new Date('2024-06').getTime(),
                y: 526023
            }, {
                x: new Date('2024-07').getTime(),
                y: 252264
            }, {
                x: new Date('2024-08').getTime(),
                y: 209532
            }, {
                x: new Date('2024-09').getTime(),
                y: 395003
            }, {
                x: new Date('2024-10').getTime(),
                y: 600353
            }, {
                x: new Date('2024-11').getTime(),
                y: 756034
            }],
        }],
        dataLabels: {
            enabled: false
        },
        xaxis: {
            type: 'datetime',
            labels: {
                show: true,
                formatter: (value: number) => {
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
        colors: ['#df0e0e', '#1361d6']
    };

    onMount(async () => {
        const ApexCharts = ((await import("apexcharts")).default);
        let chart = new ApexCharts(chartDiv, options);
        await chart.render();
    });
</script>

<div class="w-full" bind:this={chartDiv}></div>