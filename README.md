# HumanElement_MiniCartAutoOpen

## Authors

    Ajay Khampariya <ajay@human-element.com> :bowtie:
    Seth Daugherty <sdaugherty@human-element.com>
    Nate Shiff <nshiff@human-element.com>


Assuming your project has access to the human element composer repo

## Installing/Updating

to install:

```
composer require human-element/module-mini-cart-auto-open
```

to update:

```
composer update human-element/module-mini-cart-auto-open
```

## Configuration:

    Stores > Settings > Configuration > Sales > Checkout > Shopping Cart Sidebar:

    Automatically Open Minicart After Adding Product to Cart
        - Set to "Yes" to have the minicart automatically open after adding an item to the cart

    Timeout in Seconds (0-10) Before Automatically Closing Sidebar
        - Depends on auto open of minicart being enabled
        - Set the number of seconds the minicart should stay open before closing

    Scroll to Top of Page After Adding Product to Cart
        - Depends on auto open of minicart being enabled
        - Set to "Yes" to have the browser automatically scroll to top of page after adding item to cart


## Documentation:

    - Can auto open the minicart after adding product to cart
    - Can scroll page to top after adding product to cart