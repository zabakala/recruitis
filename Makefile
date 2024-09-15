setup:
	cd app && composer install
	$(MAKE) npm
	$(MAKE) npm-build

npm:
	cd app/assets/vue && npm i

npm-lint:
	cd app/assets/vue && npm run lint

npm-type-check:
	cd app/assets/vue && npm run type-check

npm-build:
	cd app/assets/vue && npm run build

compose:
	docker-compose up -d --build

test-fe:
	cd app/assets/vue && npm run test:ci

test-fe-watch:
	cd app/assets/vue && npm run test:unit

test-be:
	cd app && php bin/phpunit

test-quality:
	cd app && php vendor/bin/phpstan

logs:
	docker-compose logs -f
