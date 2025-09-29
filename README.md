# 📖 Sermon Records Feature

This update introduces a new Sermon Records module.

---

## 🆕 Added Files
- `app\Http\Controllers\SermonController.php`  
  Handles logic for listing featured and other sermons.

- `database\seeders\SermonRecordSeeder.php`  
  Seeder to populate example sermon records.

- `public\assets\streaming_background.png`  
  Background image for the hero section.

- `resources\views\main\stream\stream-list.blade.php`  
  Blade template for displaying sermons (hero, featured sermon, and sermon grid).

- `routes\web.php`  
  Added routing for Sermon Records.

---

## 🌐 Route
- **Sermon Listing Page:**  
/sermons


---

## ⚙️ Setup Instructions
1. Run database migrations:
 ```bash
 php artisan migrate
php artisan db:seed --class=SermonRecordSeeder
