FROM node:18 AS builder

WORKDIR /app

COPY package*.json ./
COPY svelte.config.js ./
COPY vite.config.js ./
COPY src ./src
COPY static ./static
COPY tsconfig.json ./

RUN npm install

RUN npm run build

FROM node:18

WORKDIR /app

COPY --from=builder /app/build ./build
COPY package*.json ./

RUN npm install --only=production

EXPOSE 3000

CMD ["node", "build"]
