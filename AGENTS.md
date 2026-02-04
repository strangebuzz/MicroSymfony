# AGENTS.md - MicroSymfony Development Guidelines

This file contains guidelines for agentic coding assistants working in the MicroSymfony repository.

## Project Overview

MicroSymfony is a Symfony 8.0 micro-framework template demonstrating modern PHP development best practices. 
It uses PHP 8.4+, Symfony 8.0, Twig 3, Hotwired (Stimulus 3.2, Turbo 8.0), and follows strict code quality standards.

## Build Commands

### Primary Task Runners

#### Castor (Preferred - Modern PHP Task Runner)

```bash
castor start                # Start development server
castor test                 # Run all tests
castor test:unit           # Run unit tests only
castor test:functional     # Run functional tests only
castor test:api            # Run API tests only
castor test:e2e            # Run E2E tests only
castor test filter=testName # Run single test
castor stan                # Run PHPStan static analysis
castor lint:all            # Run all linters
castor fix:all             # Run all fixers
castor ci                  # Run full CI locally
```

#### Make (Traditional)

```bash
make start                 # Start development server
make test                  # Run all tests
make test-unit            # Run unit tests only
make test-functional      # Run functional tests only
make test-api             # Run API tests only
make test-e2e             # Run E2E tests only
make test filter=testName # Run single test
make stan                 # Run PHPStan static analysis
make lint                 # Run all linters
make fix                  # Run all fixers
make ci                   # Run full CI locally
```

### Running Single Tests

```bash
# Preferred methods
castor test filter=testSlugify
make test filter=testSlugify

# Direct PHPUnit
vendor/bin/phpunit --filter=testSlugify
```

## Code Style Guidelines

### PHP Standards
1. **Strict Types**: Always use `declare(strict_types=1);` at the top of every PHP file
2. **Final Classes**: Mark classes as `final` unless inheritance is required
3. **Readonly Properties**: Use `readonly` property promotion for services
4. **Type Declarations**: Use full type hints for parameters and return types
5. **ADR Pattern**: Controllers use Action-Domain-Responder pattern with `__invoke()` method

### Import Conventions

```php
// Standard order: framework, Symfony components, third-party, application
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Helper\StringHelper;
```

### Naming Conventions
- **Controllers**: `*Action` (e.g., `HomeAction`, `SlugifyAction`)
- **Services**: Descriptive names (e.g., `StringHelper`, `EmailService`)
- **Tests**: `*Test` with `@covers` annotations
- **Routes**: Use class constants for route names
- **DTOs**: Descriptive names ending with `Dto` if applicable
- **Enums**: Descriptive names with proper backing types

### Error Handling
- Controllers must return Symfony Response objects
- Services use dependency injection with proper type hints
- Use proper HTTP status codes in API responses
- Implement validation using Symfony forms or constraints
- Use exceptions for error conditions with appropriate handling

## File Structure

```
src/
├── Controller/        # ADR pattern controllers
├── Data/              # Data services
├── Helper/            # Services and utilities
├── Twig/Extension/    # Custom Twig extensions
├── Form/Type/         # Form types
├── Dto/               # Data transfer objects
└── Enum/              # Enumerations

tests/
├── Unit/              # Isolated class testing
├── Integration/       # Component interaction
├── Functional/        # HTTP request/response
├── Api/               # Endpoint testing
└── E2E/               # Full application flow
```

## Configuration

- All Symfony configuration uses PHP format (not YAML)
- Service container uses full autowiring and autoconfiguration
- Asset management via importmap.php (no Webpack)
- PHPStan configured at maximum level with bleeding edge features

## Testing Requirements

1. **Unit Tests**: Test individual classes in isolation
2. **Integration Tests**: Test component interactions
3. **Functional Tests**: Test HTTP request/response cycles
4. **API Tests**: Test API endpoints with proper assertions
5. **E2E Tests**: Test complete user workflows

Always include `@covers` annotations in unit tests to specify what is being tested.

## Code Quality Standards

- **PHPStan**: Must pass at maximum level (use `castor stan` or `make stan`)
- **PHP-CS-Fixer**: Must pass with Symfony rules (use `castor fix:all` or `make fix`)
- **Frontend**: Use Biome for JS/CSS linting and formatting
- **Container**: Symfony DI container must pass linting
- **Templates**: Twig templates must pass linting

## Development Workflow

1. Write code following the established patterns
2. Run `castor test` to ensure all tests pass
3. Run `castor stan` for static analysis
4. Run `castor fix:all` for code formatting
5. Run `castor ci` to simulate full CI pipeline

## Security Considerations

- Never commit secrets or API keys
- Use proper authentication and authorization
- Validate all input data
- Use HTTPS in production
- Run `composer audit` regularly

## Frontend Guidelines

- Use Stimulus for JavaScript interactions
- Use Turbo for seamless page updates
- Follow Pico CSS conventions for styling
- Use importmap.php for asset management
- Keep JavaScript modular and reusable

## Performance Guidelines

- Use readonly properties where possible
- Optimize database queries
- Implement proper caching strategies
- Use Symfony's built-in performance tools
- Monitor memory usage in long-running processes

## Quality Gates

Before considering any code complete:
1. All tests must pass (`castor test`)
2. PHPStan must pass (`castor stan`)
3. Code style must be fixed (`castor fix:all`)
4. CI pipeline must pass locally (`castor ci`)

## Additional Resources

- Symfony Best Practices: https://symfony.com/doc/current/best_practices.html
- PHPStan Documentation: https://phpstan.org/
- PHP-CS-Fixer: https://github.com/PHP-CS-Fixer/PHP-CS-Fixer
- Castor Task Runner: https://castor.io/

Remember: This project serves as a template for modern Symfony development. 
Maintain high standards and follow established patterns.
