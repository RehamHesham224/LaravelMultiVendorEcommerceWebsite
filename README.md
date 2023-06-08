
## Multi Vendor Ecommerce

### libraries
- **"filament/filament"** Admin Panel used to manage Project
- **"filament/spatie-laravel-media-library-plugin"** used to handle media to upload and view media
- **"althinect/filament-spatie-roles-permissions"** used to manage permessions and rules
- **"srmklive/paypal"** used to deal with paypal
- **"darryldecode/cart"** used to handle cart operations
- **"laravel/ui"** used for authentication
- **"livewire"** used to edit quality , edit and delete product without refresh page

### Functionalities

- **Category**
  - Category can have subcategory
  - Show main categories in home page
- **Products**
  - View all Products related to some category
  - Show single category products
  - Search For Product
  - View Some Products from different shops in home page
- **Order**
  - Place Order
  - Manage Order by Seller
- **Cart**
  - Add products to cart
  - Show cart content
  - Delete item from cart
  - Edit quantity of item in cart " using Livewire"
  - Apply coupon
- **Checkout**
  - using Paypal
- **Shop**
  - Auth can add shop
  - if shop activated" check with observer", it will send mail to him and change role from customer to seller
- **Roles and Permissions**
  - Admin can edit , view , delete role
  - Seller role "or by permissions" how can manage his shop
  - Manage products by permissions, seller who only can delete and edit product of his shop.


