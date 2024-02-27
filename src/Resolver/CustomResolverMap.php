<?php

namespace App\Resolver;

use App\Service\QueryService;
use ArrayObject;
use GraphQL\Type\Definition\ResolveInfo;
use Overblog\GraphQLBundle\Definition\ArgumentInterface;
use Overblog\GraphQLBundle\Resolver\ResolverMap;

class CustomResolverMap extends ResolverMap
{
    private $fields = [];

    public function __construct(private QueryService $queryService)
    {
    }

    protected function map()
    {
        return [
            'Query' => [
                self::RESOLVE_FIELD => function ($value, ArgumentInterface $arguments, ArrayObject $context, ResolveInfo $resolveInfo) {
                    return match ($resolveInfo->fieldName) {
                        'user' => $this->queryService->findUser((int)$arguments['id']),
                        'users' => $this->queryService->findAllUser(),

                        'role' => $this->queryService->findRole((int)$arguments['id']),
                        'roles' => $this->queryService->findAllRole(),

                        default => null
                    };
                }
            ],
            'Mutation' => [
                self::RESOLVE_FIELD => function ($value, ArgumentInterface $arguments, ArrayObject $context, ResolveInfo $resolveInfo) {
                    return match ($resolveInfo->fieldName) {
                        'createUser' => $this,
                        'updateUser' => $this,
                        'deleteUser' => $this,
                        'createRole' => $this,
                        'updateRole' => $this,
                        'deleteRole' => $this,
                        default => null
                    };
                }
            ]
        ];
    }
}