import {type DatedValue, type Personality, type Stats, StatsType} from "$lib/types/Personality";

function getStats(min: number, max: number): Stats {
    const weeks = 52;
    const startDate = new Date(2024, 0, 1);

    const data: DatedValue[] = Array.from({ length: weeks }, (_, i) => {
        const weekDate = new Date(startDate);
        weekDate.setDate(startDate.getDate() + i * 7);
        return {
            date: weekDate,
            value: Math.floor(Math.random() * (max - min) + min),
        };
    });

    const total = data.reduce((sum, point) => sum + point.value, 0);

    return {
        total,
        history: data,
    };
}

export function getDatedValues(personality: Personality, target: StatsType): DatedValue[] {
    switch (target) {
        case StatsType.Views:
            return personality.views.history;
        case StatsType.Subscribers:
            return personality.subscribers.history;
        case StatsType.Comments:
            return personality.comments.history;
        case StatsType.Likes:
            return personality.likes.history;
        default:
            return [];
    }
}

export function generateChartSeries(personalities: Personality[], target: StatsType = StatsType.Views, limit: number | undefined = undefined): ApexAxisChartSeries {
    let series: ApexAxisChartSeries = [];
    personalities.forEach((personality) => {
        let values = getDatedValues(personality, target);

        if (limit) values = values.slice(values.length - limit, values.length);

        series.push({
            name: personality.name,
            data: values.map((datedValue: DatedValue) => ({
                x: datedValue.date,
                y: datedValue.value,
            }))
        });
    });
    return series;
}

export let personalities: Array<Personality> = [
    {
        name: "Antoine Léaument",
        image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTX8Fbg_qoMpayUly-ED6NVaJ7cvKQhbgnvNA&s",
        views: getStats(1500000, 2000000),
        subscribers: getStats(20000, 50000),
        likes: getStats(100000, 300000),
        comments: getStats(5000, 20000),
    },
    {
        name: "Manuel Bompard",
        image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxN76pFbVV--_UG3RPpQzYEMqYKlQyLO2MHQ&s",
        views: getStats(1300000, 1900000),
        subscribers: getStats(18000, 45000),
        likes: getStats(90000, 280000),
        comments: getStats(4000, 18000),
    },
    {
        name: "Mathilde Panot",
        image: "https://www.assemblee-nationale.fr/dyn/static/tribun/17/photos/carre/720892.jpg",
        views: getStats(1200000, 1800000),
        subscribers: getStats(15000, 40000),
        likes: getStats(80000, 250000),
        comments: getStats(3500, 15000),
    },
    {
        name: "Gabriel Attal",
        image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSj2KTXxzBZtPq8Jl__VM7O41VZXowTYHZY4g&s",
        views: getStats(1100000, 1700000),
        subscribers: getStats(12000, 35000),
        likes: getStats(70000, 230000),
        comments: getStats(3000, 12000),
    },
    {
        name: "Marine Tondelier",
        image: "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/20210819_tondelier.m-cr3.jpg/640px-20210819_tondelier.m-cr3.jpg",
        views: getStats(1000000, 1600000),
        subscribers: getStats(10000, 30000),
        likes: getStats(60000, 200000),
        comments: getStats(2500, 10000),
    },
    {
        name: "Clemence Guetté",
        image: "https://www.assemblee-nationale.fr/dyn/static/tribun/17/photos/carre/795310.jpg",
        views: getStats(800000, 1400000),
        subscribers: getStats(8000, 25000),
        likes: getStats(50000, 180000),
        comments: getStats(2000, 8000),
    },
    {
        name: "Louis Boyard",
        image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrLf5Iln3re0SCBMFB2qRQcisn69PTJ_Rvwg&s",
        views: getStats(600000, 1200000),
        subscribers: getStats(6000, 20000),
        likes: getStats(40000, 150000),
        comments: getStats(1500, 6000),
    },
    {
        name: "Rima Hassan",
        image: "https://upload.wikimedia.org/wikipedia/commons/6/6c/MEP_Rima_Hassan.jpg",
        views: getStats(400000, 1000000),
        subscribers: getStats(4000, 15000),
        likes: getStats(30000, 120000),
        comments: getStats(1000, 4000),
    },
    {
        name: "Pierre-Yves Cadalen",
        image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVB1jR2lYmnOgZoVXuYMh3r55mKFVJ0Vuasg&s",
        views: getStats(300000, 800000),
        subscribers: getStats(3000, 10000),
        likes: getStats(20000, 100000),
        comments: getStats(800, 3000),
    },
    {
        name: "Julien Odoul",
        image: "https://www.assemblee-nationale.fr/dyn/static/tribun/17/photos/carre/795552.jpg",
        views: getStats(250000, 700000),
        subscribers: getStats(2000, 8000),
        likes: getStats(10000, 80000),
        comments: getStats(500, 2000),
    },
];