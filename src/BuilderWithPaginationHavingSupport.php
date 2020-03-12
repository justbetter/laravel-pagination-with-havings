<?php

namespace JustBetter\PaginationWithHavings;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class BuilderWithPaginationHavingSupport extends Builder
{
    /**
     * Run a pagination count query.
     *
     * @param  array  $columns
     * @return array
     */
    protected function runPaginationCountQuery($columns = ['*'])
    {
        if ($this->havings) {
            $query = $this->cloneWithout(['orders', 'limit', 'offset'])
                          ->cloneWithoutBindings(['order']);

            // We don't need simple columns, only specials
            // like subselects which is why we're using
            // havings after all.
            foreach ($query->columns as $key => $value) {
                if (is_string($value)) {
                    unset($query->columns[$key]);
                }
            }

            $countQuery = DB::connection($this->getConnection()->getName())->table(DB::raw('('.$query->toSql().') as x'))->mergeBindings($query);

            // Using a aggregate here won't work when
            // groups are present because the
            // getCountForPagination() is
            // checking for it.
            if (!$this->groups) {
                $countQuery->setAggregate('count', $this->withoutSelectAliases($columns));
            }

            return $countQuery->get()->all();
        }

        return $this->cloneWithout(['columns', 'orders', 'limit', 'offset'])
                    ->cloneWithoutBindings(['select', 'order'])
                    ->setAggregate('count', $this->withoutSelectAliases($columns))
                    ->get()->all();
    }
}
