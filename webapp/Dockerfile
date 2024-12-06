FROM node:18 AS builder

WORKDIR /app

COPY . .

RUN npm install

RUN npm run build

FROM node:18

WORKDIR /app

COPY --from=builder /app/.svelte-kit/output ./build
COPY package*.json ./

RUN npm install --only=production

EXPOSE 3000

CMD ["node", "build"]
