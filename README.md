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

class UserTest extends TestCase
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

class UserQueryTest extends TestCase
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

class UserMutationTest extends TestCase
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
