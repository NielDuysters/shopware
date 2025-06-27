<?php declare(strict_types=1);

namespace Shopware\Core\Framework\Api\Sync;

use Shopware\Core\Framework\Log\Package;

#[Package('framework')]
class SyncBehavior
{
    /**
     * @param list<string> $skipIndexers
     * @param list<string> $skipOnlies
     */
    public function __construct(
        protected ?string $indexingBehavior = null,
        protected array $skipIndexers = [],
        protected array $skipOnlies = []
    ) {
    }

    public function getIndexingBehavior(): ?string
    {
        return $this->indexingBehavior;
    }

    /**
     * @return list<string>
     */
    public function getSkipIndexers(): array
    {
        return $this->skipIndexers;
    }

    /**
     * @return list<string>
     */
    public function getSkipOnlies(): array
    {
        return $this->skipOnlies;
    }
}
