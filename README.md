# Recipe Management System

A modern recipe management web application built with Laravel 11 and Vue 3.

## Quick Start

### Prerequisites
- PHP 8.1+
- Node.js 18+
- npm or yarn
- SQLite or MySQL/PostgreSQL

### Installation

1. **Clone or navigate to the project directory**
```bash
cd recipe_system
```

2. **Install PHP dependencies**
```bash
composer install
```

3. **Install JavaScript dependencies**
```bash
npm install
```

4. **Configure environment**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Setup database**
```bash
php artisan migrate
```

### Development

Open two terminals and run:

**Terminal 1 - Start the Laravel backend:**
```bash
php artisan serve
```
The API will be available at `http://localhost:8000`

**Terminal 2 - Start the Vue.js frontend with hot reload:**
```bash
npm run dev
```
The development server will be available at `http://localhost:5173`

### VS Code Tasks

You can use the configured VS Code tasks:
- **Laravel Server**: Runs `php artisan serve`
- **Vue Dev Server**: Runs `npm run dev`
- **Build Frontend**: Runs `npm run build`

Use `Ctrl+Shift+B` to run build tasks.

## Project Structure

```
recipe_system/
├── app/                      # Laravel application
│   ├── Http/Requests        # API request validation
│   ├── Http/Controllers     # API controllers
│   └── Models               # Eloquent models
├── resources/
│   ├── js/
│   │   ├── app.js           # Vue app entry
│   │   ├── App.vue          # Root component
│   │   └── components/      # Vue components
│   ├── css/                 # Stylesheets
│   └── views/               # Blade templates
├── routes/
│   ├── api.php              # API routes
│   └── web.php              # Web routes
├── database/
│   ├── migrations/          # Database migrations
│   └── seeders/             # Data seeders
├── public/                  # Public assets (after build)
├── vite.config.js           # Vite configuration
├── tailwind.config.js       # Tailwind CSS configuration
└── package.json             # npm dependencies
```

## Features

- 🍳 Recipe management (CRUD operations)
- 🎨 Modern Vue 3 interface
- 🎯 Tailwind CSS styling
- ⚡ Vite for fast development
- 🔌 RESTful API
- 📱 Responsive design

## Building for Production

```bash
npm run build
php artisan optimize
```

The built assets will be in `public/build/`.

## Available Scripts

### Laravel Commands
```bash
php artisan make:model Recipe -m      # Create model with migration
php artisan make:controller RecipeController --api  # Create API controller
php artisan migrate                    # Run migrations
php artisan tinker                     # Laravel shell
```

### npm Commands
```bash
npm run dev      # Start development server
npm run build    # Build for production
npm run lint     # Lint JavaScript files
```

## Database

By default, the project uses SQLite (`app.db`). To use MySQL or PostgreSQL:

1. Update the `.env` file with your database credentials
2. Update `config/database.php` if needed
3. Run migrations: `php artisan migrate`

## Tips for Development

- Vue components go in `resources/js/components/`
- Create Pinia stores in `resources/js/stores/` for state management
- Laravel API responses use JSON
- Use file watching in development for instant updates
- Check console for Vue and Laravel errors

## Troubleshooting

**Port already in use:**
```bash
php artisan serve --port=8001
npm run dev -- --port=5174
```

**Clear Laravel cache:**
```bash
php artisan optimize:clear
php artisan cache:clear
```

**Rebuild dependencies:**
```bash
rm -rf node_modules
npm install
```

**Check compilation errors:**
```bash
npm run build
```

## License

This project is open source and available under the MIT License.

## Support

For help with Laravel, visit [Laravel Documentation](https://laravel.com/docs)
For Vue.js help, visit [Vue Documentation](https://vuejs.org/guide/)


## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
