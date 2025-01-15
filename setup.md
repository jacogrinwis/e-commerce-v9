# Laravel Plugins Installation Guide

## Tailwind CSS

```bash
npm install -D tailwindcss postcss autoprefixer
```

```bash
npx tailwindcss init -p
```

tailwind.config.js

```javascript
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    plugins: [],
};
```

app.css

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

app.blade.php

```php
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  @livewireStyles
</head>
<body>
  <h1 class="text-3xl font-bold underline">
    Hello world!
  </h1>
  @livewireScripts
</body>
</html>
```

## Livewire

Modern dynamic UI components for Laravel

```bash
composer require livewire/livewire
```

## Laravel Debugbar

Debug bar for development

```bash
composer require barryvdh/laravel-debugbar --dev
```

## Tailwind Merge for Laravel

Utility for merging Tailwind CSS classes

```bash
composer require gehrisandro/tailwind-merge-laravel
```

```bash
php artisan vendor:publish --provider="TailwindMerge\Laravel\TailwindMergeServiceProvider"
```

## Spatie Tags

Powerful tagging system for Laravel models

```bash
composer require spatie/laravel-tags
```

```bash
php artisan vendor:publish --provider="Spatie\Tags\TagsServiceProvider" --tag="tags-migrations"
```

```bash
php artisan migrate
```

```bash
php artisan vendor:publish --provider="Spatie\Tags\TagsServiceProvider" --tag="tags-config"
```
