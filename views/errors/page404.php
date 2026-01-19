<!doctype html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>404 - Page non trouvée</title>
  <link rel="shortcut icon" href="/public/img/favicon.ico" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <style>
    @keyframes gradient-flow {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .animated-gradient {
      background: linear-gradient(-45deg, #35259b, #be3c7d, #5bbfe0, #6809c0);
      background-size: 400% 400%;
      animation: gradient-flow 15s ease infinite;
    }

    .glass {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }
  </style>
</head>

<body class="min-h-screen animated-gradient flex items-center justify-center p-4">

  <div class="glass rounded-2xl shadow-2xl p-12 text-center max-w-2xl w-full">
    
    <!-- Illustration 404 -->
    <div class="mb-8">
      <div class="text-9xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
        404
      </div>
    </div>

    <!-- Message d'erreur -->
    <h1 class="text-3xl font-bold text-gray-900 mb-4">
      Oups ! Page introuvable
    </h1>
    <p class="text-gray-600 text-lg mb-8">
      La page que vous recherchez semble avoir disparu dans les méandres du web. Elle a peut-être été déplacée ou n'existe plus.
    </p>

    <!-- Illustration SVG -->
    <div class="mb-8">
      <svg class="w-48 h-48 mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
      </svg>
    </div>

    <!-- Bouton retour accueil -->
    <div class="flex justify-center">
      <a href="/" class="px-8 py-3 text-white bg-gradient-to-r from-purple-600 to-pink-600 rounded-lg hover:shadow-lg transition-all font-medium inline-flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
        </svg>
        Retour à l'accueil
      </a>
    </div>

  </div>

</body>

</html>