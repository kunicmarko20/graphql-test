GraphQL Test Case
=================

Makes testing your GraphQL queries and mutations easier.

Support for Symfony, Lumen and Laravel.

Documentation
-------------

* [Installation](#installation)
* [How to use](#how-to-use)
* [Examples](#examples)
    * [Query](#query)
    * [Mutation](#mutation)

## Installation

**1.**  Add dependency with composer

```bash
composer require kunicmarko/kunicmarko/graphql-test
```

> If you are using Symfony you will have to install "symfony/browser-kit".

## How to use

Depending on your framework, extend the correct `TestCase`:

```php
use KunicMarko\GraphQLTest\Bridge\Symfony\TestCase;
use KunicMarko\GraphQLTest\Bridge\Lumen\TestCase;
use KunicMarko\GraphQLTest\Bridge\Laravel\TestCase;
```

> Everything you see in the next snippets is the same for all Test Cases.

In your tests you now have 2 additional helper methods:

```php
public function query(QueryInterface $query, array $files = [], array $headers = []);
public function mutation(MutationInterface $mutation, array $files = [], array $headers = [])
```

By default, endpoint is `/graphql`, you can overwrite this by changing variable in your tests:

```php
use KunicMarko\GraphQLTest\Bridge\Symfony\TestCase;

class UserTest extends TestCase
{
    public static $endpoint = '/';
}

```

There is a helper method that allows you to preset headers:

```php
use KunicMarko\GraphQLTest\Bridge\Symfony\TestCase;

class SettingsTest extends TestCase
{
    protected function setUp()
    {
        $this->setDefaultHeaders([
            'Content-Type' => 'application/json',
        ]);
    }
}

```

## Examples

### Query

```php
use KunicMarko\GraphQLTest\Bridge\Symfony\TestCase;
use KunicMarko\GraphQLTest\Query;

class SettingsQueryTest extends TestCase
{
    public static $endpoint = '/';

    protected function setUp()
    {
        $this->setDefaultHeaders([
            'Content-Type' => 'application/json',
        ]);
    }

    public function testSettingsQuery(): void
    {
        $query = $this->query(
            new Query(
                'settings',
                [],
                [
                    'name',
                    'isEnabled',
                ],
            )
        );
        
        //Fetch response and do asserts
    }
}
```

`KunicMarko\GraphQLTest\Query` construct accepts 3 arguments:

* name of query (mandatory)
* parameters (optional)
* fields (optional)

### Mutation

```php
use KunicMarko\GraphQLTest\Bridge\Symfony\TestCase;
use KunicMarko\GraphQLTest\Mutation;

class SettingsMutationTest extends TestCase
{
    public static $endpoint = '/';

    protected function setUp()
    {
        $this->setDefaultHeaders([
            'Content-Type' => 'application/json',
        ]);
    }

    public function testSettingsMutation(): void
    {
        $mutation = $this->mutation(
            new Mutation(
                'createSettings',
                [
                    'name' => 'hide-menu-bar',
                    'isEnabled' => true,
                ],
                [
                    'name',
                    'isEnabled',
                ],
            )
        );
        
        //Fetch response and do asserts
    }
}
```

`KunicMarko\GraphQLTest\Mutation` construct accepts 3 arguments:

* name of mutation (mandatory)
* parameters (optional)
* fields (optional)

If you have a custom type as an argument you will have to pass it as `KunicMarko\GraphQLTest\Type`
to avoid wrapping it in quotes.

```php
use KunicMarko\GraphQLTest\Bridge\Symfony\TestCase;
use KunicMarko\GraphQLTest\Mutation;
use KunicMarko\GraphQLTest\Type;

class UserMutationTest extends TestCase
{
    //...
    public function testUserMutation(): void
    {
        $mutation = $this->mutation(
            new Mutation(
                'createUser',
                [
                    
                    'username' => 'kunicmarko20',

                    // In this case salutation is an EnumType
                    'salutation' => new Type('Mr'),
                    //..
                ],
                [
                    'username',
                    'salutation',
                ],
            )
        );
        
        //Fetch response and do asserts
    }
}
```
