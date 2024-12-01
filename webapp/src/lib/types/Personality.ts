interface Personality {
    name: string;
    image: string;
    views: number;
    subscribers: number;
    status: "downgrade" | "upgrade" | "stable";
}