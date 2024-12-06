export enum StatsType {
    Views,
    Subscribers,
    Likes,
    Comments
}

export interface DatedValue {
    date: Date,
    value: number,
}

export interface Stats {
    total: number;
    history: DatedValue[];
}

export interface Personality {
    name: string;
    image: string;
    views: Stats;
    subscribers: Stats;
    likes: Stats;
    comments: Stats;
}