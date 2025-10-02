# 📖 Sermon Records & Streaming Management

Masih belum ikut template admin.

---
## 📝 Routes
- `/sermons`
- `/admin/sermons`

## 🆕 Added Files
- `app/Http/Controllers/SermonController.php`  
  Handles public sermon listing (featured + grid) and admin CRUD actions.

- `database/seeders/SermonRecordSeeder.php`  
  Seeder for demo sermon data.

- `public/assets/streaming_background.png`  
  Background image for the hero section.

- `resources/views/main/stream/stream-list.blade.php`  
  Public page Blade template for displaying hero, featured sermon, and sermon grid.

- `resources/views/admin/stream/stream-list.blade.php`  
  Admin interface for managing streaming records (table + modals + preview).

---

## 🛠️ Modified Files
- `routes/web.php`  
  Added **admin routes** for Streaming CRUD:
  ```php
  Route::prefix('admin')->name('admin.')->group(function () {
      Route::prefix('sermons')->name('sermons.')->group(function () {
          Route::get('/', [SermonController::class, 'adminIndex'])->name('index');
          Route::post('/store', [SermonController::class, 'store'])->name('store');
          Route::put('/{id}/update', [SermonController::class, 'update'])->name('update');
          Route::delete('/{id}/delete', [SermonController::class, 'destroy'])->name('destroy');
      });
  });

- `app\Models\SermonRecord.php`  
  Added **model** for sermons CRUD:
  ```php
    class SermonRecord extends Model
    {
        protected $table = 'sermon_records';
        protected $fillable = [
            'title',
            'youtube_link',
        ];
    }
resources/js (via Blade inline script)
Added streamingCrud() Alpine component to manage modals and preview.

