FROM node:20-alpine AS build

WORKDIR /app
ENV NPM_CONFIG_LOGLEVEL=warn

COPY package.json package-lock.json ./
RUN npm install

COPY . .
RUN npm run build

FROM node:20-alpine

WORKDIR /app

ENV HOST=0.0.0.0
ENV PORT=3000

COPY --from=build /app/.output ./.output

EXPOSE 3000

CMD ["node", ".output/server/index.mjs"]
