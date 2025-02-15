# Translation Service API 🌍

A **Laravel-based Translation Service API** that allows managing translations efficiently. It is secured with **Laravel Passport** for authentication and supports **CRUD operations** with proper test coverage. The project is **Dockerized** with Nginx, PHP, and MySQL.

---

## 🚀 Features

✅ **RESTful API** for managing translations  
✅ **User authentication** using Laravel Passport  
✅ **Dockerized setup** (Nginx, PHP, MySQL)  
✅ **Automated database migrations & seeding**  
✅ **Feature and unit tests implemented**  

---

## 🛠️ Installation

### **1. Clone the Repository**  
```bash
git clone https://github.com/your-username/your-repo.git
cd your-repo
```

### **2. Setup Environment**  
Copy the example `.env` file:  
```bash
cp .env.example .env
```
Update **database** and **Passport** settings in `.env` as needed.  

### **3. Install Dependencies**  
```bash
composer install
npm install
```

### **4. Generate App Key & Migrate Database**  
```bash
php artisan key:generate
php artisan migrate --seed
php artisan passport:install
```

---

## 🚀 Running the Application

### **Using Laravel’s built-in server**  
```bash
php artisan serve
```

### **With Docker**  
```bash
docker-compose up --build -d
```

---

## 🔑 Authentication

This API uses **Laravel Passport** for authentication.  

### **Install Passport**  
```bash
php artisan passport:install
```

### **Obtain an Access Token**  
Make a **POST** request to:  
```
POST /oauth/token
```
With the following **payload**:  
```json
{
  "grant_type": "password",
  "client_id": "your-client-id",
  "client_secret": "your-client-secret",
  "username": "user@example.com",
  "password": "your-password",
  "scope": ""
}
```
The response will return an **access token** to be used for authentication.  

---

## 🧪 Running Tests  
```bash
php artisan test
```

---

## 📚 API Endpoints  

### **Authentication**  
🔹 `POST /oauth/token` – Get an **Access Token**  

### **Translations**  
🔹 `GET /api/translations` – List all translations  
🔹 `POST /api/translations` – Create a new translation  
🔹 `GET /api/translations/{id}` – Retrieve a translation by ID  
🔹 `PUT /api/translations/{id}` – Update a translation  
🔹 `DELETE /api/translations/{id}` – Delete a translation  

---

## 📜 License  

This project is **licensed** under the **MIT License**.

