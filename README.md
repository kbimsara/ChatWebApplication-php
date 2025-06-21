# ChatWebApplication-php

A simple web-based chat application built using PHP and MySQL, designed to facilitate real-time messaging between users. This project demonstrates the core functionalities of a chat platform, including user authentication, message exchange, and a user-friendly interface.

---

## Features

- User registration and login system for secure access
- Real-time messaging between users (using PHP and JavaScript)
- Message history and chat log display
- Responsive web interface

---

## Installation

1. **Clone the Repository**
```
git clone https://github.com/kbimsara/ChatWebApplication-php.git
```

2. **Set Up Your Web Server**
- Ensure you have a local server environment (XAMPP, WAMP, MAMP, or similar) with PHP and MySQL installed.
- Place the cloned project folder into your web server's root directory (e.g., `htdocs` for XAMPP).

3. **Create the Database**
- Open phpMyAdmin (or any MySQL interface).
- Create a new database (e.g., `chat_app`).
- Import the provided SQL file (if available) or use the following SQL schema as a starting point:
  ```
  CREATE DATABASE chat_app;
  USE chat_app;

  CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  );

  CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender_id INT NOT NULL,
    receiver_id INT NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  );
  ```
- If the repository contains a `.sql` file, import it to set up the required tables automatically.

4. **Configure Database Connection**
- Edit the configuration file (e.g., `config.php`) to add your MySQL credentials:
  ```
  $db_host = 'localhost';
  $db_user = 'your_mysql_username';
  $db_pass = 'your_mysql_password';
  $db_name = 'chat_app';
  ```
- Save the file.

5. **Run the Application**
- Start your web server and navigate to `http://localhost/ChatWebApplication-php/` in your browser.
- Register a new user or log in with existing credentials to start chatting.

---

## Usage

- Register a new account via the registration page.
- Log in with your credentials.
- Access the chat interface to send and receive messages in real time.
- View previous messages in the chat history.

---

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request with your improvements or bug fixes.


---

## Credits

Developed by [kbimsara]. Inspired by open-source PHP chat applications and community tutorials.

---

> For any questions or support, please open an issue in the repository.

---

**Note:**  
If you encounter any issues during setup, ensure your PHP and MySQL services are running and that your database credentials are correct. For further troubleshooting, consult your web server and PHP error logs.
