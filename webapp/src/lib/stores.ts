import { writable } from "svelte/store";
import type { Writable } from "svelte/store";

export const topLimit: Writable<number> = writable(3);
