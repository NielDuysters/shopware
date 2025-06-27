---
title: Add possibility to the context to define which specific indexer should run
author: Niel Duysters
author_email: niel.duysters@meteor.be
author_github: @nielduysters
---
# Core
* Added `EntityIndexerRegistry::EXTENSION_INDEXER_ONLY` to the `EntityIndexerRegistry` to allow specific indexers.

# Upgrade Information

## Add possibility to specify indexer in context
When you want to specify in-code which indexer should run you can specify the 
`EntityIndexerRegistry::EXTENSION_INDEXER_ONLY` extension in the context as follows:
```php
$context->addExtension(EntityIndexerRegistry::EXTENSION_INDEXER_ONLY,
    new ArrayEntity(
        [
            // Only execute STOCK_UPDATER.
            ProductIndexer::STOCK_UPDATER
        ]
    ),
);
```

When making a call to the Sync API, specify the required indexer in the header:
```
curl -X POST "http://localhost:8000/api/_action/sync" \
-H "indexing-only: product.stock" \
...
```
