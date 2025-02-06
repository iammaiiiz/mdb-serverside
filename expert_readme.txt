Admin management
    Admin access
    - "/" or "/admin" Can login as admin by "admin" passphase
    - If enter to admin management without login will show error 401 unauthorized
    Manageing Company
    - "/admin/companies" Will show all company , change status , view a company
    - "/admin/companies/[id]" Can see a company detail and edit
    - "/admin/companies/new" Can create a new company
    - "/admin/companies/edit/{id}" Can edit a company
    Manageing Product
    - "/admin/products" Will show all product , change status , view a product and remove when product is hidden
    - "/admin/products/[GTIN]" Can see a product detail , edit and remove image
    - "/admin/products/new" Can create a new product (GTIN should be 13-14 digits)
    - "/admin/products/edit/{GTIN}" Can edit a product
    JSON API Outputs
    - "/json/products.json" Will show all product api with company contact and owner
    - "/json/products.json?query=keyword..." Will show all product name or description contain the keyword
    - "/json/[GTIN].json" Will show a product api with company contact and owner when found a GTIN if not found will show error 404 not found

Public-facing Page
    - "/GTIN/verify" Will show textarea that you can find a valid GTIN if valid all will show green tick
    - "/products/{GTIN}" Can see a product and change language when found The GTIN if not found will show error 404 not found

** Database and er-diagram are in database/sql floder