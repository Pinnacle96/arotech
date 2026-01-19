# AROTECH POWER LIMITED Website

Official website for **AROTECH POWER LIMITED**, a professional engineering and technology company based in Lagos, Nigeria. This website showcases the company's services in electrical engineering, solar solutions, smart automation, security systems, and digital solutions.

## 🚀 Features

- **Responsive Design:** Fully responsive layout built with Tailwind CSS.
- **Service Showcases:** Detailed pages for Electrical, Solar, Smart Homes, Security, and Digital services.
- **Contact Form:** Functional contact form with email notifications via SMTP (powered by PHPMailer).
- **Project Portfolio:** Gallery of completed projects across various categories.
- **Maintenance Plans:** Information on support and maintenance services.

## 🛠️ Technology Stack

- **Frontend:** HTML5, CSS3, JavaScript, Tailwind CSS (CDN)
- **Backend:** PHP (Vanilla)
- **Dependencies:** PHPMailer (managed via Composer)
- **Server:** Apache (WAMP/XAMPP recommended)

## 📋 Prerequisites

Before you begin, ensure you have the following installed:
- [PHP](https://www.php.net/) (7.4 or higher)
- [Composer](https://getcomposer.org/) (Dependency Manager for PHP)
- Local Server Environment (e.g., [WAMP](https://www.wampserver.com/en/), [XAMPP](https://www.apachefriends.org/), or PHP built-in server)

## ⚙️ Installation & Setup

1.  **Clone the Repository**
    ```bash
    git clone https://github.com/yourusername/arotech.git
    cd arotech
    ```

2.  **Install Dependencies**
    Run the following command to install PHPMailer and other dependencies:
    ```bash
    composer install
    ```

3.  **Configure Credentials**
    The project uses a configuration file for sensitive data (like SMTP credentials).
    
    - Copy the sample configuration file:
      ```bash
      cp config.sample.php config.php
      ```
      *(On Windows, you can just copy and rename the file manually)*
    
    - Open `config.php` and update the SMTP settings with your email provider's details:
      ```php
      return [
          'smtp' => [
              'host' => 'smtp.gmail.com',
              'auth' => true,
              'username' => 'your_email@gmail.com',
              'password' => 'your_app_password', // Use App Password for Gmail
              'secure' => 'tls',
              'port' => 587,
              'from_email' => 'your_email@gmail.com',
              'from_name' => 'Arotech Website'
          ]
      ];
      ```

4.  **Run the Project**
    - **Using WAMP/XAMPP:** Move the project folder to your `www` or `htdocs` directory and access it via `http://localhost/arotech`.
    - **Using PHP Built-in Server:**
      ```bash
      php -S localhost:8000
      ```
      Then open [http://localhost:8000](http://localhost:8000) in your browser.

## 📁 Project Structure

```
arotech/
├── assets/             # CSS, JS, and Images
├── includes/           # Header and Footer templates
├── vendor/             # Composer dependencies (PHPMailer)
├── config.php          # Configuration file (Ignored by Git)
├── config.sample.php   # Sample configuration file
├── contact.php         # Contact page
├── process_contact.php # Backend logic for contact form
├── index.php           # Homepage
├── services.php        # Services overview
├── projects.php        # Project portfolio
├── .gitignore          # Git ignore rules
├── composer.json       # Composer configuration
└── README.md           # Project documentation
```

## 🤝 Collaboration Guide

To contribute to this project, please follow these steps:

1.  **Clone the Repository**
    ```bash
    git clone https://github.com/yourusername/arotech.git
    cd arotech
    ```

2.  **Create a New Branch**
    Always work on a separate branch for your changes:
    ```bash
    git checkout -b feature/your-feature-name
    # or for bug fixes
    git checkout -b fix/bug-description
    ```

3.  **Make Your Changes**
    - Implement your feature or fix.
    - Ensure your code follows the existing style and structure.
    - Test your changes locally to ensure everything works as expected.

4.  **Commit Your Changes**
    Write clear and descriptive commit messages:
    ```bash
    git add .
    git commit -m "Add: Description of the feature added"
    # or
    git commit -m "Fix: Description of the bug fixed"
    ```

5.  **Push to the Repository**
    ```bash
    git push origin feature/your-feature-name
    ```

6.  **Create a Pull Request (PR)**
    - Go to the repository on GitHub.
    - Click on "Compare & pull request".
    - Provide a clear description of your changes and submit the PR for review.

## 🔒 Security Note

- **Never commit `config.php`** or any file containing real passwords/API keys to version control.
- The `.gitignore` file is pre-configured to exclude `config.php`, `vendor/`, and log files.

## 📞 Developer Contact

**Pinnacle Tech Hub**  
� info.pinnacletechhub@gmail.com  
🌐 [https://pinnacletechhub.com.ng/](https://pinnacletechhub.com.ng/)  
📞 07032078859 (Call & WhatsApp)
