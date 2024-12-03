const generateWeeksForYear = (year: number): Date[] => {
    const dates: Date[] = [];
    let date = new Date(year, 0, 1);
    while (date.getFullYear() === year) {
        dates.push(new Date(date));
        date.setDate(date.getDate() + 7);
    }
    return dates;
};

const getWeeklyValue = (min: number = 2000000, max: number = 300000): DatedValue[] => {
    return generateWeeksForYear(2024).map((date) => {
        return {
            x: date,
            y: Math.floor(Math.random() * (min - max)) + max
        };
    });
};

export const getMonthlyValue = (data: DatedValue[]): DatedValue[] => {
    const result: DatedValue[] = [];
    const seenMonths = new Set<string>(); // Pour suivre les mois déjà ajoutés

    data.forEach((item) => {
        const monthKey = `${item.x.getFullYear()}-${item.x.getMonth()}`; // Clé unique pour chaque mois
        if (!seenMonths.has(monthKey)) {
            result.push(item); // Ajouter la première valeur de ce mois
            seenMonths.add(monthKey);
        }
    });

    return result;
};

export let personnalities: Array<Personality> = [
    {name: "Antoine Léaument", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTX8Fbg_qoMpayUly-ED6NVaJ7cvKQhbgnvNA&s", views: getWeeklyValue(500000, 2000000), subscribers: getWeeklyValue(500, 50000)},
    {name: "Manuel Bompard", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxN76pFbVV--_UG3RPpQzYEMqYKlQyLO2MHQ&s", views: getWeeklyValue(500000, 2000000), subscribers: getWeeklyValue(500, 50000)},
    {name: "Mathilde Panot", image: "https://www.assemblee-nationale.fr/dyn/static/tribun/17/photos/carre/720892.jpg", views: getWeeklyValue(500000, 2000000), subscribers: getWeeklyValue(500, 50000)},
    {name: "Gabriel Attal", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSj2KTXxzBZtPq8Jl__VM7O41VZXowTYHZY4g&s", views: getWeeklyValue(500000, 2000000), subscribers: getWeeklyValue(500, 50000)},
    {name: "Marine Tondelier", image: "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/20210819_tondelier.m-cr3.jpg/640px-20210819_tondelier.m-cr3.jpg", views: getWeeklyValue(500000, 2000000), subscribers: getWeeklyValue(500, 50000)},
    {name: "Clemence Guetté", image: "https://www.assemblee-nationale.fr/dyn/static/tribun/17/photos/carre/795310.jpg", views: getWeeklyValue(500000, 2000000), subscribers: getWeeklyValue(500, 50000)},
    {name: "Louis Boyard", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrLf5Iln3re0SCBMFB2qRQcisn69PTJ_Rvwg&s", views: getWeeklyValue(500000, 2000000), subscribers: getWeeklyValue(500, 50000)},
    {name: "Rima Hassan", image: "https://upload.wikimedia.org/wikipedia/commons/6/6c/MEP_Rima_Hassan.jpg", views: getWeeklyValue(200000, 2000000), subscribers: getWeeklyValue(500, 50000)},
    {name: "Louis Boyard", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrLf5Iln3re0SCBMFB2qRQcisn69PTJ_Rvwg&s", views: getWeeklyValue(200000, 2000000), subscribers: getWeeklyValue(500, 50000)},
    {name: "Louis Boyard", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrLf5Iln3re0SCBMFB2qRQcisn69PTJ_Rvwg&s", views: getWeeklyValue(200000, 2000000), subscribers: getWeeklyValue(500, 50000)}
];
