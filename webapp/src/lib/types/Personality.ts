interface DatedValue {
    x: Date,
    y: number
}

interface Personality {
    name: string;
    image: string;
    views: DatedValue[];
    subscribers: DatedValue[];
}