# Problem 1:

# Problem 2: Fix and Optimize This Code

 - Comparison between the two-product service

| Report              | Faulty Products | Optimized Products  |
|---------------------|-----------------|---------------------|
| Query Count         | 301             | 6 (cached 1)        |
| Execution Time (MS) | 60.79           | 35.85 (cached 1.32) |
| Memory Usage (MB)   | 2               | 2  (cached N/A)     |

# Faulty Products Service
 - Loading all products into memory using `all()` method.
 - Not using eager loading. E.g.: `with()`
 - Not caching
 - Not using pagination
 - Not using `where()` clause method optimization
 - Not using `pagination()` method
 - Loading category model by `id` instead of using relationship.
 - Accessing each model will cause an N+1 query problem.
 - Creating a new attribute `category_name, review_count, avg_rating` in the product model.

# Optimized Products Service
 - Using eager loading. E.g.: `with()`
 - Caching the results for 5 seconds (Demo purpose only)
 - Using pagination
 - Using `where()` clause method optimization
 - Using `get()` method instead of `all()` method.
 - Using `transform()` method to create a new attribute array `category_name, review_count, avg_rating`
 - Loading category model by relationship.
 - Avoiding N+1 query problem.
 - OVERALL: Caching the results and optimizing the query will improve the performance and seamless access to the API and also enhance the user experience.

## Extension Questions
 1. How would you add pagination (25 products per page)? 
    -  To add pagination to model, we can use `paginate()` or `simplePaginate` method, which will return an object and also in `pagination()` method which will accepts a `per_page` number we can pass in query parameter or directly set `pagination(25)`.
 2. How would you add filtering by category?
    -  To filter by category, we can use `where('category_id', '=', 1)` method in a model, passing category id.
 3. How would you add sorting by price or rating?
    -  To sort by price or rating, we can use `orderBy('price', 'asc')` or `orderBy('rating', 'desc')` method in a model.
 4. What would you do differently for 100,000 products?
    -  To optimize the query for 100,000 products, we can use `chunk()` method in a model.
