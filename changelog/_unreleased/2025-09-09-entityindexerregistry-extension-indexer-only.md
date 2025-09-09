---
title: Add the possibility to the context to define which specific indexer should run
author: Niel Duysters
author_email: niel.duysters@meteor.be
author_github: @nielduysters
---

# Core

* Added `EntityIndexerRegistry::EXTENSION_INDEXER_ONLY` extension to the `EntityIndexerRegistry` which can be added to the `Context` to allow specific indexers.

___

# API

* Added `indexing-only` header to the Sync API to allow only specific indexers to run.

# Upgrade Information

## Add the possibility to specify indexer in context

When you want to specify which indexer should run, you can add the `EntityIndexerRegistry::EXTENSION_INDEXER_ONLY` extension to the context as follows:

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

```bash
curl -X POST "http://localhost:8000/api/_action/sync" \
-H "indexing-only: product.stock" \
#...
```
