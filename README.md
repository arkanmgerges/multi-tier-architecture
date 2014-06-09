Multi-Tier Architecture
=======================

This is a multi-tier architecture core used for creating applications, it has a flexible application layers as follows:
1. Use case layer:
  This layer will contain only use cases that will interact with the outside world like frameworks, cli...etc
2. Data gateway layer:
  This layer is responsible of taking the request sent from the use case and return a response, this layer can interact with the data base, calls to api, using memcache ...etc
3. Entities are recognized by both layers use case and data gateway, and they do not have any dependencies.
