const CACHE_NAME = 'data-management-app-v1';
const urlsToCache = [
    '/',
    'xampp_web/static/js/script.js',
    'xampp_web/static/js/install_app.js',
    'xampp_web/static/pwa/service/manifest.json',
    'xampp_web/static/pwa/service/service-worker.js',
    'xampp_web/templates/header/navbar.php',
    'xampp_web/templates/main/base.php',
    'xampp_web/templates/main/index.php',
];

self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then((cache) => {
                console.log('Opened cache');
                return cache.addAll(urlsToCache);
            })
            .catch((error) => {
                console.error('Failed to open cache:', error);
            })
    );
});

self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames.map((cacheName) => {
                    if (cacheName !== CACHE_NAME) {
                        console.log('Deleting old cache:', cacheName);
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});

self.addEventListener('fetch', (event) => {
    event.respondWith(
        caches.match(event.request)
            .then((response) => {
                if (response) {
                    return response;
                }
                return fetch(event.request).catch(() => {
                    return caches.match('/offline.html'); // Fallback page
                });
            })
    );
});
