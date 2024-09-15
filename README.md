# RECRUITIS

This template should help get you started developing the project.

## DEV Steps To Get Things Going

Add valid token to **RECRUITIS_API_AUTH_TOKEN** environment variable in _.env.local_ file.

Everything can then be managed by _Makefile_. Take steps in the following order from the project root to spin up a working app:

```sh
make setup # installs FE and BE dependencies
make compose # starts the dockerized app in dev mode
```

App should be running at http://localhost:8089/

Other useful steps (again from the root of the project):

```sh
make npm  # re-installs FE dependencies if needed
make npm-lint  # lints FE codebase
make npm-type-check  # validates Typescript in FE codebase
make npm-build # re-builds FE assets if needed
make test-fe # unit-test and snapshot test FE codebase
make test-fe-watch # watch FE unit tests for any changes
make test-be # unit-test BE codebase
make test-quality # PHPStan to check BE codebase quality
make logs # inspect logs of the running app
```

### Features

- Docker
- PHP ^8
- Symfony ^7
- Vue ^3
- TypeScript ^5
- Snapshots Test Coverage
