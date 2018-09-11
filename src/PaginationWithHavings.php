<?php

namespace JustBetter\PaginationWithHavings;

trait PaginationWithHavings
{
    protected function newBaseQueryBuilder()
    {
        $connection = $this->getConnection();

        return new BuilderWithPaginationHavingSupport(
            $connection,
            $connection->getQueryGrammar(),
            $connection->getPostProcessor()
        );
    }
}
