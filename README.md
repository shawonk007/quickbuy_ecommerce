# QuickBuy - Multivendor System Ecommerce Platform

**[QuickBuy](https://quickbuy.shawon-khan.com/)** is a fully responsive multivendor system ecommerce platform/web application. It is developed using **[Object-Oriented PHP]** and utilizes the **[Bootstrap 5.3.0](https://getbootstrap.com/)** framework along with JavaScript/jQuery plugins. The platform is designed to be compatible with various screen resolutions, providing optimal user experience across small mobile devices to large desktops.


## Live Preview

To preview this project please visit **<https://quickbuy.shawon-khan.com/>**.


## Features

- **[Multivendor system] :** **[QuickBuy](https://quickbuy.shawon-khan.com/)** supports multiple vendors, allowing them to create and manage their own stores within the platform.
- **[Responsive design] :** The platform is built with a responsive layout, ensuring seamless user experience across different devices and screen sizes.
- **[Object-Oriented PHP] :** **[QuickBuy](https://quickbuy.shawon-khan.com/)** is developed using the Object-Oriented PHP programming language, which promotes code reusability and maintainability.
- **[Bootstrap framework] :** It utilizes the **[Bootstrap 5.3.0](https://getbootstrap.com/)** framework, providing a robust and customizable foundation for the user interface.
- **[Merchant stores] :** Merchants have the ability to create and manage their own stores, including product listings, inventory management, and order processing.
- **[User-friendly interface] :** The platform offers a user-friendly interface, making it easy for both merchants and customers to navigate and interact with the system.
- **[Shopping cart] :** Customers can add products to their shopping cart and proceed to checkout for a seamless purchasing experience.
- **[Order management] :** Merchants can efficiently manage their orders, track shipments, and update order statuses.
- **[Payment integration] :** **[QuickBuy](https://quickbuy.shawon-khan.com/)** integrates with popular payment gateways, allowing customers to make secure online payments.
- **[Product search and filtering] :** Customers can easily search for products and apply filters to find their desired items quickly.
- **[Wishlist functionality] :** Customers can create and manage their wishlist, saving products for future reference.
- **[Review and rating system] :** Customers can leave reviews and ratings for products, providing valuable feedback for other users.


## Installation

To install **[QuickBuy](https://quickbuy.shawon-khan.com/)**, please follow the steps below:

#### Via Git
```bash
git clone https://github.com/shawonk007/quickbuy_ecommerce.git
```

#### Install Dependencies
```bash
composer i
```

#### Configure Autloads
```bash
composer dump-autoload
```

1. Clone the repository to your local machine or download the source code as a ZIP file.
2. Ensure you have a compatible web server (e.g., Apache) and **[Composer](https://getcomposer.org/download/)** installed on your machine.
3. Import the provided database file into your MySQL database.
3. Update the database configuration in the application's configuration file (database.php) under config folder with your database credentials.
5. Upload the application files to your web server.
6. Ensure that the necessary file and directory permissions are set to enable read and write access.
7. Access the application through your web browser.

**Note:** Make sure you have PHP and MySQL installed and properly configured on your server.


## Usage

After the installation, you can access **[QuickBuy](https://quickbuy.shawon-khan.com/)** through your web browser. As an administrator, you will have access to the admin panel to manage the system settings, merchants, and products. Merchants can create their stores and manage their products and orders through their dedicated merchant panel. Customers can browse products, add items to their shopping cart, and proceed to checkout.

#### Configure Path
After clone or installation this project please make sure you configure your path on **(config/app.php)**. Please change **["YOUR_DIRECTORY"]** to your to the directory of this project on your local server as given below :

```bash
'root'=> 'http://localhost/YOUR_DIRECTORY/',
'auth'=> 'http://localhost/YOUR_DIRECTORY/auth',
'admin'=> 'http://localhost/YOUR_DIRECTORY/admin',
'merchant'=> 'http://localhost/YOUR_DIRECTORY/merchant',
```


## Acknowledgments

- The **[QuickBuy](https://quickbuy.shawon-khan.com/)** project is developed only demo purpose right now based on the concepts of ecommerce platforms and online marketplaces.
- The development of **[QuickBuy](https://quickbuy.shawon-khan.com/)** was made possible by the contributions of various individuals and open-source libraries.
- We would like to express our gratitude to the developers and communities behind PHP, Bootstrap, and other tools used in this project.