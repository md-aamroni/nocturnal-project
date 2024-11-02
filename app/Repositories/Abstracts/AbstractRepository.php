<?php

namespace App\Repositories\Abstracts;

use Illuminate\Http\Request;

abstract class AbstractRepository extends AbstractInjector
{
    protected $urlQuery;

    /**
     * Create a new repository instance
     * @param  Request $request
     * @return void
     */
    final public function __construct(
        protected Request $request
    ) {
        $this->urlQuery = (object) $this->request->query();
    }

    /**
     * Get a new static repository instance
     * @param  Request $request
     * @return static
     */
    public static function instance(Request $request): static
    {
        return new static(request: $request);
    }
}
