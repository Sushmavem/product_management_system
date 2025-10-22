# Symfony Framework Based Project

## 📘 Introduction
This project is developed using the **Symfony Framework**, a modern PHP framework that follows the **MVC (Model-View-Controller)** architecture.  
It aims to demonstrate how structured, reusable, and secure web applications can be built efficiently using Symfony compared to traditional PHP + XAMPP setups.

## 🚀 Why Symfony?
Symfony provides a powerful and flexible structure for web development:
- ✅ **MVC Architecture:** Ensures clean separation between business logic, UI, and data handling.
- ⚙️ **Reusable Components:** Includes form handling, authentication, routing, and templating out-of-the-box.
- 🧩 **Faster Development:** Built-in commands, debugging tools, and configuration management speed up development.
- 🔒 **Security:** Comes with CSRF protection, user authentication, and password hashing.
- 🌐 **Scalability:** Easy to maintain and scale for large projects.

### 🔄 Difference Between Symfony and PHP + XAMPP
| Feature | Symfony | PHP + XAMPP |
|----------|----------|-------------|
| **Architecture** | MVC (well-structured) | Procedural / manual structure |
| **Reusability** | High (uses components) | Low (manual coding) |
| **Security** | Built-in | Must be implemented manually |
| **Speed** | Faster for large projects | Slower with scale |
| **Maintenance** | Easy | Harder to manage |

---

## 🏗️ Project Structure (MVC Pattern)

Symfony organizes code into clear directories:
```
project_root/
│
├── config/         # Configuration files (routing, services)
├── src/
│   ├── Controller/ # Handles requests and responses
│   ├── Entity/     # Defines database models
│   └── Repository/ # Handles data queries
│
├── templates/      # Front-end views (Twig templates)
├── public/         # Public assets (index.php, CSS, JS)
├── migrations/     # Database schema changes
└── .env            # Environment variables
```

### 🧠 MVC Flow
1. **Model (Entity + Repository):** Defines database structure and logic.  
2. **View (templates):** Displays data to the user using Twig.  
3. **Controller:** Connects Models and Views, processes requests, and returns responses.

---

## 💻 Code Explanation

Example Controller: `BookController.php`
```php
#[Route('/book', name: 'book')]
public function index(BookRepository $bookRepo): Response
{
    $books = $bookRepo->findAll();
    return $this->render('book/index.html.twig', [
        'books' => $books,
    ]);
}
```
- Fetches all book data using the repository.
- Passes the data to the Twig view for rendering.

---

## 🔗 API Endpoints

| Method | Endpoint | Description |
|--------|-----------|-------------|
| GET | `/api/books` | Fetch all books |
| POST | `/api/books` | Add a new book |
| GET | `/api/books/{id}` | Get a single book by ID |
| PUT | `/api/books/{id}` | Update a book |
| DELETE | `/api/books/{id}` | Delete a book |

Example Response:
```json
{
  "id": 1,
  "title": "Learn Symfony",
  "author": "John Doe",
  "published_year": 2024
}
```

---

## 🖼️ Output Screenshots
1. 🧾 **Home Page:** Displaying all records.  
2. ➕ **Add New Record Page:** Form to insert data.  
3. ✏️ **Edit Page:** Update existing record.  
4. ❌ **Delete Action:** Confirmation and removal.  
*(Insert screenshots here)*

---

## ⚙️ Installation & Setup

### Prerequisites
- PHP 8.1+
- Composer
- MySQL
- Symfony CLI

### Steps
```bash
# Clone the repository
git clone https://github.com/yourusername/yourproject.git
cd yourproject

# Install dependencies
composer install

# Create environment file
cp .env.example .env

# Set up database
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

# Run the server
symfony serve
```

Access the app in your browser:  
👉 http://127.0.0.1:8000

---

## 🧩 Major Issues Encountered
- Configuration errors while setting up database connection.  
- Routing mismatches due to incorrect annotations.  
- Twig template rendering errors during controller integration.  
- Doctrine migration issues during schema updates.

---

## 🧠 Learnings
- Improved understanding of **MVC architecture** and routing.  
- Hands-on experience in **ORM (Doctrine)** and **Twig templates**.  
- Understanding of **RESTful API development** using Symfony.  
- Gained practical experience in **debugging and dependency management**.

---

## 👩‍💻 Author
**Sushma Vem**  
Master’s Student, Computer Science  
Auburn University at Montgomery  
📧 vemsushmareddy@gmail.com  
🔗 [LinkedIn](www.linkedin.com/in/sushma-reddy-551281238)

---

## 📄 License
This project is for **academic purposes only** and not intended for commercial use.
