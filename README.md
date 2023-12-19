# Api
- rotas post atenção no Content-type application/json

# Dicas gerais
- criar algo e devolver com relacionamento
    - created->load('relacionamento')


# Sanctum
- ja vem instalado por default
- login
```php
public function login(Request $request)
{
    if (Auth::attempt($request->only('email', 'password'))) {
        $abilities = ['invoice-store', 'invoice-update'];
        return $this->response(
            'Authorizaed',
            200,
            [
                'token' => $request->user()->createToken('invoice', $abilities)->plainTextToken
            ]
        );
    }

    return $this->response('Not Authorized', 403);
}
```
- middleare nas rotas ir no kernel
```php
// ter todas habilidades
// ['auth:sanctum', 'abilities:check-status,place-orders']
'abilities' => \Laravel\Sanctum\Http\Middleware\CheckAbilities::class,
// ter pelo menos uma habilidade
// ['auth:sanctum', 'abilities:check-status,place-orders']
'ability' => \Laravel\Sanctum\Http\Middleware\CheckForAnyAbility::class,
```
