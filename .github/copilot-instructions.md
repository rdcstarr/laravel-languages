# Copilot Instructions (NovaHub)

Follow these rules when generating or editing code in this repository.

## 1) Primary goals (in order)

1. **Correctness first** (match existing behavior unless asked to change it).
2. **Minimalist & pragmatic** (prefer the simplest solution that stays maintainable).
3. **Laravel best practices** (idiomatic, conventional, predictable).

## 2) Style: “Minimal, linear, guard-first”

Write code that is easy to read top-to-bottom:

- Prefer a **linear flow** (a small number of branches).
- Use **guard clauses early** (`abort_if`, `throw_if`, early returns) to avoid nested conditionals.
- Keep **state and variables minimal** (only what’s needed).
- Avoid “helper-method mania”: extract only when it **removes duplication** or **improves clarity**.
- Avoid overengineering (extra services/classes/patterns) unless there is clear payoff.
- Group side effects logically (e.g., configure/share/apply defaults together).

## 3) PHP formatting & conventions

- **Always use Allman brace style**:

    ```php
    if ($condition)
    {
        // ...
    }
    ```

- Follow the **Laravel way**:
    - Prefer Eloquent/Query Builder conventions.
    - Prefer framework helpers/facades when idiomatic.
    - Use `config()`, `app()`, `view()`, `URL::defaults()`, etc., in a consistent manner.

## 4) PHPDoc requirements (mandatory)

Add **English PHPDoc** above **every function/method** (including constructors), containing:

- A short description (one sentence).
- `@param` for **each** parameter (with type).
- `@return` with the return type.

Example:

```php
/**
 * Resolve and apply the request language.
 *
 * @param Request $request
 * @param Closure $next
 * @return Response
 */
public function handle(Request $request, Closure $next): Response
{
    // ...
}
```

## 5) Class method order (mandatory)

Order class methods by visibility:

1. `public`
2. `protected`
3. `private`

(Within a visibility group, keep a logical order: constructor near top, then primary entrypoints, then helpers.)

## 6) Laravel Artisan Commands

- Do **not** use `return Command::SUCCESS` or `return Command::FAILURE` (deprecated in this project).
- Prefer `public function handle(): void` and **throw exceptions** or use `$this->error(...)` and return naturally when appropriate.

## 7) Quality rules

- Prefer **explicit types** where practical (typed params/returns, typed properties).
- Keep functions **small and focused**.
- Do not introduce breaking changes unless requested.
- If uncertain, ask a **single clarifying question** rather than guessing.
- Keep code consistent with existing patterns in the project.

## 8) What to avoid

- Deeply nested conditionals.
- Unnecessary abstractions, factories, DTO layers “just because”.
- Repeating the same query/logic in multiple places when a single source of truth is easy.
- Clever one-liners that reduce readability.

## 9) When changing existing code

- Make the **smallest diff** that achieves the goal.
- Preserve existing naming conventions and architecture unless the user asks to refactor.
- Add/adjust tests when reasonable and requested.
