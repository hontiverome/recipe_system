# Recipe Management System - Development Setup

## Project Overview
- **Technology Stack**: Laravel 11 + Vue 3 + Tailwind CSS
- **Purpose**: A full-stack recipe management web application
- **Architecture**: RESTful API backend (Laravel) + SPA frontend (Vue.js)

## Environment Setup Complete
The following has been configured:
- ✅ Laravel 11 framework installed
- ✅ Vue 3 integrated with Vite
- ✅ Tailwind CSS for styling
- ✅ npm dependencies installed

## Project Structure
```
recipe_system/
├── app/                    # Laravel application logic
├── routes/                 # API and web routes
├── database/              # Migrations and seeders
├── resources/
│   ├── js/                # Vue.js components and app logic
│   │   ├── app.js        # Vue app entry point
│   │   └── App.vue       # Root component
│   └── css/              # Stylesheets
├── public/                # Public assets
├── vite.config.js        # Vite configuration
├── tailwind.config.js    # Tailwind CSS configuration
└── package.json          # npm dependencies
```

## Getting Started

### 1. Environment Configuration
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 2. Database Setup
```bash
# Update .env with your database credentials
# Then run migrations
php artisan migrate
```

### 3. Start Development Servers
Open two terminals:

**Terminal 1 - Backend (Laravel API)**:
```bash
php artisan serve
```
Server will run on `http://localhost:8000`

**Terminal 2 - Frontend (Vue.js with hot reload)**:
```bash
npm run dev
```
Assets will be served by Vite

### 4. Build for Production
```bash
npm run build
php artisan optimize
```

## Key Features Configured
- **Vue 3 Composition API** ready
- **Tailwind CSS** for responsive UI
- **Vite** for fast development and bundling
- **Laravel API** for backend logic
- **Hot Module Replacement** for instant updates during development

## Frontend Components
- Main App.vue component with basic layout
- Navigation header ready for customization
- Tailwind CSS styling pre-configured

## API Routes Ready
Create API routes in `routes/api.php` for recipe management:
- GET/POST /api/recipes
- GET/PUT/DELETE /api/recipes/{id}

## Next Steps
1. Create Laravel models for recipes
2. Create API controllers
3. Build Vue components for recipe listing, creation, and editing
4. Set up routing and navigation
5. Implement database migrations

## Useful Commands
```bash
# Laravel commands
php artisan make:model Recipe -m  # Create model with migration
php artisan make:controller RecipeController --api
php artisan migrate

# npm commands
npm run dev      # Start dev server
npm run build    # Build for production
npm run lint     # Check code quality
```

## Development Tips
- Place Vue components in `resources/js/components/`
- Use `resources/js/stores/` for Pinia state management (install if needed)
- API responses should be JSON
- Use Laravel's `resource` method for consistent API responses

## Database
By default, the project is configured to use SQLite (app.db). Update `.env` to use MySQL, PostgreSQL, or other databases as needed.

## Troubleshooting
- Clear cache: `php artisan cache:clear`
- Clear compiled files: `php artisan optimize:clear`
- Rebuild npm: `rm -rf node_modules && npm install`
- Check npm build: `npm run build` to catch compilation errors

---
**Last Updated**: Setup complete with Laravel 11 + Vue 3 + Tailwind CSS
